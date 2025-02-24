@include('admin.include.header')
<div class="container">
    <div class="tab-pane fade show active" id="id1" role="tabpanel">
            <form action="{{ url('send_user_email', $emailData->id) }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-12">
                    <div class="crancy-ptabs__separate">
                        <div class="crancy-ptabs__form-main">
                            <div class="crancy__item-group">
                                <h4 class="crancy__item-group__title text-center">{{ $emailData->user_email }}</h4>
                                <div class="crancy__item-form--group">
                                    <div class="row">
                                        <div class="col-lg-6 col-12">
                                            <div class="crancy__item-form--group mg-top-form-20">
                                                <label class="crancy__item-label">Email Greeting</label>
                                                <input class="crancy__item-input @error('title') is-invalid @enderror" type="text"
                                                    placeholder="Enter Email Greeting" name="greeting" value="{{ old('greeting') }}">
                                                    @error('pro_name')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-12">
                                            <div class="crancy__item-form--group mg-top-form-20">
                                                <label class="crancy__item-label">Email First Line</label>
                                                <input class="crancy__item-input" placeholder="Enter Email First Line" value="{{ old('firstline') }}" type="text" name="firstline">
                                                @error('productDisc')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="crancy__item-form--group">
                                    <div class="row">
                                        
                                        <div class="col-lg-6 col-12">
                                            <div class="crancy__item-form--group mg-top-form-20">
                                                <label class="crancy__item-label">Email Button</label>
                                                <input class="crancy__item-input @error('title') is-invalid @enderror" type="text"
                                                 value="{{ old('email_button') }}" name="email_button">
                                                    @error('productActualPrice')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-12">
                                            <div class="crancy__item-form--group mg-top-form-20">
                                                <label class="crancy__item-label">Email Url</label>
                                                <input class="crancy__item-input @error('title') is-invalid @enderror" type="text"
                                                    placeholder="Enter Email Url" name="email_url" value="{{ old('email_url') }}">
                                                    @error('productPrice')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="crancy__item-form--group">
                                    <div class="row">
                                        <div class="col-lg-6 col-12">    
                                                <div class="crancy__item-form--group mg-top-form-20">
                                                <label class="crancy__item-label">Email Body Message</label>
                                                <textarea class="crancy__item-input textAreabox" name="email_body" cols="30" rows="10">{{ old('email_body') }}</textarea>
                                                @error('email_body')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror    
                                                </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="crancy__item-button--group crancy__item-button--group--fix crancy__ptabs-bottom">
                <button class="crancy-btn crancy-color8__bg" type="submit">Send Email</button>
            </div>
        </form>
    </div>
</div>
@include('admin.include.footer')
