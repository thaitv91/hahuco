<div class="form-seo margin-bottom-30">
	<h4 class="btn btn-primary margin-bottom-30" role="button" data-toggle="collapse" href="#collapseSeo" aria-expanded="false" aria-controls="collapseSeo">Chỉnh sửa SEO</h4>
	<div class="collapse"  id="collapseSeo">
		<div class="form-group margin-bottom-30">
			<label>SEO Title</label>
			<input type="text" name="seoable_title" class="form-control" value="{{ isset($seoable_title) ? $seoable_title : '' }}">
		</div>

		<div class="form-group margin-bottom-30">
			<label>SEO Description</label>
			<textarea class="form-control" name="seoable_description">{{ isset($seoable_description) ? $seoable_description : '' }}</textarea>
		</div>

		<div class="form-group margin-bottom-30">
			<label style="display: block;">Seo Keyword</label>
			<input class="form-control" name="keyword" type="text" value="{{ isset($keyword) ? $keyword : '' }}" data-role="tagsinput" style="display: none;">
		</div>
	</div>
</div><!-- /.form-seo -->