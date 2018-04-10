<?php

namespace PackagePage\Pages\Models;

use Illuminate\Database\Eloquent\Model;

class TemplateField extends Model
{
    protected $table = "template_fields";
    
    protected $fillable = [
        'title', 'content','type', 'template', 'slug'
    ];

    public function render() {
        switch ($this->type) {
            case 'text':
                $html = '<div class="form-group margin-bottom-30 row">
                            <label  class="col-md-2 col-md-offset-1" for="name">'.$this->title.'</label>
                                <div class="col-md-6"><input class="form-control" type="text" id="'. $this->id .'" name="'. $this->slug .'" value="' . trim($this->content, '</p>') . '"></div>
                                <div class="col-md-2 row"><input class="form-control" type="text" readonly value="' . $this->slug . '"></div></div>';
                break;
            case 'textarea':
                $html = '<div class="form-group margin-bottom-30 row">
                            <label  class="col-md-2 col-md-offset-1" for="name">'.$this->title.'</label>
                                <div class="col-md-6"><textarea class="form-control" rows="5" id="'. $this->id .'" name="'. $this->slug .'" >'. $this->content .'</textarea></div>
                                <div class="col-md-2 row"><input class="form-control" type="text" readonly value="' . $this->slug . '"></div></div>';
                break; 
            case 'file':
                $html = '<div class="form-group margin-bottom-30 row">
                            <label  class="col-md-2 col-md-offset-1" for="name">'.$this->title.'</label>
                                <div class="col-md-6"><input type="file" name="'. $this->slug .'" value="" id="'. $this->slug .'" class="required borrowerImageFile" data-errormsg="PhotoUploadErrorMsg"><img src="/'. $this->content .'" id="previewHolder-'. $this->id .'" alt="" width="170px" height="100px"/></div>
                                <div class="col-md-2 row"><input class="form-control" type="text" readonly value="' . $this->slug . '"></div></div>';
                break;
             case 'select':
                // $data = explode(',', $content);
                $html = '<div class="form-group margin-bottom-30 row">
                            <label  class="col-md-2 col-md-offset-1" for="name">'.$this->title.'</label>
                            <div class="col-md-6">
                            <textarea class="form-control" rows="5" id="'. $this->id .'" name="'. $this->slug .'" >'. $this->content .'</textarea></div>
                            <div class="col-md-2 row"><input class="form-control" type="text" readonly value="' . $this->slug . '"></div></div>';
                break;
            case 'radio':
                // $data = explode(',', $content);
                $html = '<div class="form-group margin-bottom-30 row">
                            <label  class="col-md-2 col-md-offset-1" for="name">'.$this->title.'</label>
                            <div class="col-md-6">
                            <textarea class="form-control" rows="5" id="'. $this->id .'" name="'. $this->slug .'" >'. $this->content .'</textarea></div>
                            <div class="col-md-2 row"><input class="form-control" type="text" readonly value="' . $this->slug . '"></div></div>';
                break;   
            case 'checkbox':
                // $data = explode(',', $content);
                $html = '<div class="form-group margin-bottom-30 row">
                            <label  class="col-md-2 col-md-offset-1" for="name">'.$this->title.'</label>
                                <div class="col-md-6"><textarea class="form-control" rows="5" id="'. $this->id .'" name="'. $this->slug .'" >'. $this->content .'</textarea></div><div class="col-md-2 row"><input class="form-control" type="text" readonly value="' . $this->slug . '"></div></div>';
                break;
            case 'submit':
                // $data = explode(',', $content);
                $html = '<div class="form-group margin-bottom-30 row">
                            <label  class="col-md-2 col-md-offset-1" for="name">'.$this->title.'</label>
                            <div class="col-md-6"><textarea class="form-control" rows="5" id="'. $this->id .'" name="'. $this->slug .'" >'. $this->content .'</textarea></div><div class="col-md-2 row"><input class="form-control" type="text" readonly value="' . $this->slug . '"></div></div>';
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
                $html .= '<div class="form-group margin-bottom-30 row">
                            <label  class="col-md-2 col-md-offset-1" for="name">'.$this->title.'</label>
                            <div class="col-md-8">
                                <select class="form-control typeSelect model-name" data-page-field-id='.$this->id.' id="model-name-'. $this->id .'" name="'. $this->slug .'[model_name]">';
                                
                foreach ($fileNames as $fileName) {
                    if ($fileName === '.' or $fileName === '..') continue;
                    $option = substr($fileName,0,-4);
                    $string = '<option '.($data->model_name == $option?'selected':'').' value="'.$option.'">'.$option.'</option>';      
                    $html .= $string;
                }
                $html .= '</select>
                </div>
                </div>';

                // Render column
                $modelName = 'App\Models\\'.$data->model_name;
                $model = new $modelName;
                $table = $model->getTable();
                $columns = \DB::getSchemaBuilder()->getColumnListing($table);
                $html .= '<div class="form-group margin-bottom-30 row">
                            <label  class="col-md-2 col-md-offset-1" for="name"></label>
                            <div class="col-md-8">
                                <select class="form-control typeSelect order-by" id="order-by-'. $this->id .'" name="'. $this->slug .'[order_by]">';
                                                
                foreach ($columns as $column) {
                    $string = '<option '.($data->order_by == $column?'selected':'').' value="'.$column.'">'.$column.'</option>';      
                    $html .= $string;
                }
                $html .= '</select>
                </div>
                </div>';

                $html .= '<div class="form-group margin-bottom-30 row">
                        <label  class="col-md-2 col-md-offset-1" for="name"></label>
                        <div class="col-md-8">';
                $html .='<input class="form-control" rows="5" id="limit-'. $this->id .'" name="'. $this->slug .'[limit]" value="'. $data->limit .'">
                    </div>
                </div>';

                $html .= "</div>";
                break;
                case 'widget' :
                $path = app_path() . "/Widgets";
                $fileNames = scandir($path);
                $html = '<div class="form-group margin-bottom-30 row">
                            <label  class="col-md-2 col-md-offset-1" for="name">'.$this->title.'</label>
                            <div class="col-md-8">
                                <select class="form-control typeSelect" id="'. $this->id .'" name="'. $this->slug .'">';
                                
                foreach ($fileNames as $fileName) {
                    if ($fileName === '.' or $fileName === '..') continue;
                    $option = substr($fileName,0,-4);
                    $string = '<option '.($this->content==$option?'selected':'').' value="'.$option.'">'.$option.'</option>';      
                    $html .= $string;
                }
                $html .= '</select>
                </div>
                </div>';
                break;  
            default:
                # code...
                break;
        }

        return $html;
    }



    public function renderTemplate() {
        switch ($this->type) {
            case 'text':
                $html = '<div class="form-group margin-bottom-30">
                            <label  class="" for="name">'.$this->title.'</label>
                            <input class="form-control" type="text" id="'. $this->id .'" name="'. $this->slug .'" value="' . trim($this->content, '</p>') . '">
                            <input class="form-control" type="text" readonly value="' . $this->slug . '">
                        </div>';
                break;
            case 'textarea':
                $html = '<div class="form-group margin-bottom-30">
                            <label  class="" for="name">'.$this->title.'</label>
                            <textarea class="form-control" rows="5" id="'. $this->id .'" name="'. $this->slug .'" >'. $this->content .'</textarea>
                            <input class="form-control" type="text" readonly value="' . $this->slug . '"></div>';
                break; 
            case 'file':
                $html = '<div class="form-group margin-bottom-30">
                            <label  class="" for="name">'.$this->title.'</label>
                            <input type="file" name="'. $this->slug .'" value="" id="'. $this->slug .'" class="required borrowerImageFile" data-errormsg="PhotoUploadErrorMsg"><img src="/'. $this->content .'" id="previewHolder-'. $this->id .'" alt="" width="170px" height="100px"/>
                            <input class="form-control" type="text" readonly value="' . $this->slug . '"></div>';
                break;
             case 'select':
                // $data = explode(',', $content);
                $html = '<div class="form-group margin-bottom-30">
                            <label  class="" for="name">'.$this->title.'</label>
                            <select class="form-control typeSelect" id="'. $this->id .'" name="'. $this->slug .'">';
                foreach (json_decode($this->content) as $key => $value) {
                    $string = '<option value="'.$value.'">'.$value.'</option>';      
                    $html .= $string;
                }
                $html .= '</select>
                <input class="form-control" type="text" readonly value="' . $this->slug . '">
                </div>';
                break;
            case 'radio':
                // $data = explode(',', $content);
                $html = '<div class="form-group margin-bottom-30">
                            <label  class="" for="name">'.$this->title.'</label>
                            <select class="form-control typeSelect" id="'. $this->id .'" name="'. $this->slug .'">';
                foreach (json_decode($this->content) as $key => $value) {
                    $string = '<option value="'.$value.'">'.$value.'</option>';      
                    $html .= $string;
                }
                $html .= '</select>
                <input class="form-control" type="text" readonly value="' . $this->slug . '">
                </div>';
                break;   
            case 'checkbox':
                // $data = explode(',', $content);
                $html = '<div class="form-group margin-bottom-30">
                            <label  class="" for="name">'.$this->title.'</label>
                            <select class="form-control typeSelect" id="'. $this->id .'" name="'. $this->slug .'">';
                foreach (json_decode($this->content) as $key => $value) {
                    $string = '<option value="'.$value.'">'.$value.'</option>';      
                    $html .= $string;
                }
                $html .= '</select>
                <input class="form-control" type="text" readonly value="' . $this->slug . '">
                </div>';
                break;
            case 'submit':
                // $data = explode(',', $content);
                $html = '<div class="form-group margin-bottom-30">
                            <label  class="" for="name">'.$this->title.'</label>
                            <select class="form-control typeSelect" id="'. $this->id .'" name="'. $this->slug .'">';
                foreach (json_decode($this->content) as $key => $value) {
                    $string = '<option value="'.$value.'">'.$value.'</option>';      
                    $html .= $string;
                }
                $html .= '</select>
                <input class="form-control" type="text" readonly value="' . $this->slug . '">
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
                $html .= '<option disabled selected value="">Select a model</option>';
                foreach ($fileNames as $fileName) {
                    if ($fileName === '.' or $fileName === '..') continue;
                    $option = substr($fileName,0,-4);
                    $string = '<option '.($data->model_name == $option?'selected':'').' value="'.$option.'">'.$option.'</option>';      
                    $html .= $string;
                }
                $html .= '</select>
                </div>';

                $modelName = 'App\Models\\'.$data->model_name;
                $model = new $modelName;
                $table = $model->getTable();
                $columns = \DB::getSchemaBuilder()->getColumnListing($table);
                $html .= '<div class="form-group margin-bottom-30">
                            <label  class="" for="name"></label>
                                <select class="form-control typeSelect order-by" id="order-by-'. $this->id .'" name="'. $this->slug .'[order_by]">';
                                $html .= '<option value="">Select a field to order by </option>';                  
                foreach ($columns as $column) {
                    $string = '<option '.($data->order_by == $column?'selected':'').' value="'.$column.'">'.$column.'</option>';      
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
                    $string = '<option '.($this->content==$option?'selected':'').' value="'.$option.'">'.$option.'</option>';      
                    $html .= $string;
                }
                $html .= '</select>
                </div>';
                break;  
            default:
                # code...
                break;
        }

        return $html;
    }
}