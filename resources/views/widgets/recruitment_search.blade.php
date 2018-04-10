<section class="search-recruitment space-global">
    <form action="{{ route('recruitment.search') }}">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <div class="form-group">
                        <input type="text" name="keyword" class="form-control" placeholder="Tiêu đề công việc, vị trí, địa điểm làm việc"/>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <select class="form-control" name="job">
                                    <option value="" selected>Tất cả nghành nghề</option>
                                    @foreach ($jobs as $job)
                                    <option value="{{ $job->id }}">{{ $job->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <select class="form-control" name="place">
                                    <option value="" selected>Tất cả địa điểm</option>
                                    @foreach ($places as $place)
                                    <option value="{{ $place->id }}">{{ $place->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <button class="btn btn-block btn-outline-light" type="submit"><i class="fa fa-search"></i> Tìm kiếm</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    </section><!-- /.search-recruitment -->