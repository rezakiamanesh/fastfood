<div class="row row-message" id="section6">
    <div class="col-lg-6 col-md-6 mx-auto col-12 ">
        <p class="caption-sec">ثبت نظر </p>
        <p class="title-review" id="section6"> ( نظر خود در درباره این محصول را ثبت
            نمایید ) </p>
        @auth()
        <form method="post"
              action="{{ route('site.comment.store',$entity->id) }}"
              class="form-horizontal mt-3" id="form-review">
           @csrf
            <input type="hidden" name="commentable_type"
                   value="{{ get_class($entity) }}">
            <div class="row">

                <div class="col-md-6 col-12 rate-comment">

                                     <span>
                                          <label class="control-label">امتیاز</label>
                                     </span>
                    <span class="star-rating">
                                        <div class="star-rating__wrap">
                                            <input class="star-rating__input" id="star-rating-5" type="radio"
                                                   name="rating" value="5">
                                            <label class="star-rating__ico fa fa-star-o fa-lg"
                                                   for="star-rating-5"></label>
                                            <input class="star-rating__input" id="star-rating-4" type="radio"
                                                   name="rating" value="4">
                                            <label class="star-rating__ico fa fa-star-o fa-lg"
                                                   for="star-rating-4"></label>
                                            <input class="star-rating__input" id="star-rating-3" type="radio"
                                                   name="rating" value="3">
                                            <label class="star-rating__ico fa fa-star-o fa-lg"
                                                   for="star-rating-3"></label>
                                            <input class="star-rating__input" id="star-rating-2" type="radio"
                                                   name="rating" value="2">
                                            <label class="star-rating__ico fa fa-star-o fa-lg"
                                                   for="star-rating-2"></label>
                                            <input class="star-rating__input" id="star-rating-1" type="radio"
                                                   name="rating" value="1">
                                            <label class="star-rating__ico fa fa-star-o fa-lg"
                                                   for="star-rating-1"></label>
                                        </div>
                                    </span>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-sm-12  col">
                    <div class="form-group">
                <textarea name="comment" id="comment" class="form-control  message-box-review" cols="5" rows="5"
                          placeholder="متن پیام"></textarea>
                        @if($errors->has('comment'))
                            <span class="text-danger">{{ $errors->first('comment') }}</span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col">
                    <div class="form-group">
                        <button type="submit" class="btn btn-comment">ارسال
                        </button>
                    </div>
                </div>
            </div>
        </form>
        @else
            <div class="form pcomment-form">
            <span class="alert alert-info" style="display: block">برای ارسال دیدگاه ابتدا <a
                    href="{{ route('login') }}">وارد شوید</a></span>
            </div>
        @endauth
    </div>
</div>
