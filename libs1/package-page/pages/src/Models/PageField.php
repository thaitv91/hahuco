<?php

namespace PackagePage\Pages\Models;

use Illuminate\Database\Eloquent\Model;

class PageField extends Model
{
    protected $table = "page_fields";
    
    protected $fillable = [
        'page_id', 'title', 'content_template', 'content', 'template', 'type', 'slug'
    ];
    public function renderPage() {
        $html = '';
        switch ($this->type) {
            case 'text':
                $html = '<div class="form-group margin-bottom-30">
                            <label for="name">'.$this->title.'</label>';
                	if ($this->content != '') {
                		$html .='<input class="form-control" type="text" id="'. $this->id .'" name="'. $this->slug .'" value="' . trim($this->content, '</p>') . '">
                        </div>';
                	} else {
                		$html .='<input class="form-control" type="text" id="'. $this->id .'" name="'. $this->slug .'" value="' . trim($this->content_template, '</p>') . '">
                        </div>';
                	}
                break;
            case 'textarea':
                $html = '<div class="form-group margin-bottom-30">
                        <label  class="" for="title">'.$this->title.'</label>';
                if ($this->content != '') {
                		$html .='<textarea class="form-control my-editor" rows="5" id="'. $this->id .'" name="'. $this->slug .'" >'. $this->content .'</textarea>
                        </div>';
                	} else {
                		$html .='<textarea class="form-control my-editor" rows="5" id="'. $this->id .'" name="'. $this->slug .'" >'. $this->content_template .'</textarea>
                        </div>';
                	}
                ;
                break; 
            case 'file':
                $html = '<div class="form-group margin-bottom-30">
                            <label  class="" for="name">'.$this->title.'</label>
                            <input type="file" name="'. $this->slug .'" value="" id="'. $this->slug .'" class="required borrowerImageFile" data-errormsg="PhotoUploadErrorMsg">
                            <img src="/'. $this->content_template .'" id="previewHolder-'. $this->id .'" alt="" width="170px" height="100px"/>
        					<input class="form-control" type="hidden" id="'. $this->id .'" name="'. $this->slug .'" value="' .$this->content_template .'">
                            </div>';
                break;
             case 'select':
                $html = '<div class="form-group margin-bottom-30">
                            <label  class="" for="name">'.$this->title.'</label>
                            <select class="form-control typeSelect" id="'. $this->id .'" name="'. $this->slug .'">';
                foreach (json_decode($this->content_template) as $key => $value) {
                	$string = '<option '.($this->content==$value?'selected':'').' value="'.$value.'">'.$value.'</option>';      
                    $html .= $string;
                }
                $html .= '</select>
                </div>';
                break;
            case 'radio':
                 $html = '<div class="form-group margin-bottom-30">
                            <label  class="" for="name">'.$this->title.'</label>
                                <select class="form-control typeSelect" id="'. $this->id .'" name="'. $this->slug .'">';
                foreach (json_decode($this->content_template) as $key => $value) {
                    $string = '<option '.($this->content==$value?'selected':'').' value="'.$value.'">'.$value.'</option>';
                    $html .= $string;
                }
                $html .= '</select>
                </div>';
                break;   
            case 'checkbox':
                 $html = '<div class="form-group margin-bottom-30"><label  class="" for="name">'.$this->title.'</label>
                    <select class="form-control typeSelect" id="'. $this->id .'" name="'. $this->slug .'">';
                foreach (json_decode($this->content_template) as $key => $value) {
                    $string = '<option '.($this->content==$value?'selected':'').' value="'.$value.'">'.$value.'</option>';
                    $html .= $string;
                }
                $html .= '</select>
                </div>';
                break;
            case 'object' : 
                $html = '<div id="object-field-'.$this->id.'">';
                if ($this->content != '') 
                    $data = json_decode($this->content);
                else 
                    $data = json_decode( $this->content_template);

                //Render model field
                $path = app_path() . "/Models";
                $fileNames = scandir($path);
                $html .= '<div class="form-group margin-bottom-30">
                            <label  class="" for="name">'.$this->title.'</label>
                                <select class="form-control typeSelect model-name" data-page-field-id='.$this->id.' id="model-name-'. $this->id .'" name="'. $this->slug .'[model_name]">';
                foreach ($fileNames as $fileName) {
                    if ($fileName === '.' or $fileName === '..') continue;
                    $option = substr($fileName,0,-4);
                    $string = '<option '.($data->model_name == $option?'selected':'').' value="'.$option.'">'.$option.'</option>';      
                    $html .= $string;
                }
                $html .= '</select>
                </div>';

                // Render column
                $modelName = 'App\Models\\'.$data->model_name;
                $model = new $modelName;
                $table = $model->getTable();
                $columns = \DB::getSchemaBuilder()->getColumnListing($table);
                $html .= '<div class="form-group margin-bottom-30">
                            <label  class="" for="name"></label>
                            <select class="form-control typeSelect order-by" id="order-by-'. $this->id .'" name="'. $this->slug .'[order_by]">';
                $html .= '<option value="">Select a field to order by </option>';
                                                         
                foreach ($columns as $column) {
                    if($data->order_by == null)
                        {       
                             $string = '<option value="'.$column.'">'.$column.'</option>';      
                        }else{
                             $string = '<option '.($data->order_by == $column?'selected':'').' value="'.$column.'">'.$column.'</option>';      
                        }
                   
                    $html .= $string;
                }
                $html .= '</select>
                </div>';

                $html .= '<div class="form-group margin-bottom-30">
                        <label  class="" for="name"></label>';
                $html .='<input class="form-control" rows="5" id="limit-'. $this->id .'" name="'. $this->slug .'[limit]" value="'. $data->limit .'">';
                $html .= "</div>";
                break;
            case 'widget' :
                $path = app_path() . "/Widgets";
                $fileNames = scandir($path);
                $html = '<div class="form-group margin-bottom-30">
                            <label  class="" for="name">'.$this->title.'</label>
                            <select class="form-control typeSelect" id="'. $this->id .'" name="'. $this->slug .'">';
                                
                foreach ($fileNames as $fileName) {
                    if ($fileName === '.' or $fileName === '..') continue;
                    $option = substr($fileName,0,-4);
                    $string = '<option '.(($this->content ? $this->content : $this->content_template)==$option?'selected':'').' value="'.$option.'">'.$option.'</option>';      
                    $html .= $string;
                }
                $html .= '</select>
                </div>';
                break;
            default:
                break;
        }

        return $html;
    }
}
