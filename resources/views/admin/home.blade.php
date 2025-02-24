@include('admin.include.header')
<section class="crancy-adashboard crancy-show">
    <div class="container">
       <div class="row">
          <div class="col-xxl-9 col-12 crancy-main__column">
             <div class="crancy-body">
                <div class="crancy-dsinner">
                   <div class="row">
                      <div class="col-xl-2 col-lg-6 col-md-6 col-12 mg-top-30">
                         <div class="crancy-progress-card">
                            <div class="crancy-progress-card__content">
                               <h4 class="crancy-progress-card__title"><b class="count-animate">${{ $totalRevenue }}</b></h4>
                               <div class="crancy-progress-card__history">
                                  <span class="crancy-progress-card__percent crancy-color1">
                                     <svg class="crancy-color1__fill" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M15.4308 3.30786L14.4437 3.30786L10.5548 3.30786L9.56762 3.30786C8.2813 3.30786 7.47984 4.70322 8.12798 5.81431L11.0596 10.8399C11.7027 11.9424 13.2957 11.9424 13.9389 10.8399L16.8705 5.81431C17.5186 4.70322 16.7171 3.30786 15.4308 3.30786Z" />
                                        <path opacity="0.4" d="M4.16878 15.8335L5.15594 15.8335L9.04483 15.8335L10.032 15.8335C11.3183 15.8335 12.1198 14.4381 11.4716 13.327L8.54002 8.30144C7.89689 7.19893 6.30389 7.19892 5.66076 8.30143L2.72915 13.327C2.08101 14.4381 2.88247 15.8335 4.16878 15.8335Z" />
                                     </svg>
                                     + 3.5%
                                  </span>
                                  <span>Total Sells</span>
                               </div>
                            </div>
                            <div class="crancy-progress__single circle__one" data-value="0.115"><b class="number crancy-color1">11.5%</b></div>
                         </div>
                      </div>
                      <div class="col-xl-2 col-lg-6 col-md-6 col-12 mg-top-30 mg-top-20-rs">
                         <div class="crancy-progress-card">
                            <div class="crancy-progress-card__content">
                               <h4 class="crancy-progress-card__title"><b class="count-animate">{{ $orderCount }}</b></h4>
                               <div class="crancy-progress-card__history">
                                  <span class="crancy-progress-card__percent  crancy-color2">
                                     <svg class="crancy-color2__fill" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M15.4308 3.30786L14.4437 3.30786L10.5548 3.30786L9.56762 3.30786C8.2813 3.30786 7.47984 4.70322 8.12798 5.81431L11.0596 10.8399C11.7027 11.9424 13.2957 11.9424 13.9389 10.8399L16.8705 5.81431C17.5186 4.70322 16.7171 3.30786 15.4308 3.30786Z" />
                                        <path opacity="0.4" d="M4.16878 15.8335L5.15594 15.8335L9.04483 15.8335L10.032 15.8335C11.3183 15.8335 12.1198 14.4381 11.4716 13.327L8.54002 8.30144C7.89689 7.19893 6.30389 7.19892 5.66076 8.30143L2.72915 13.327C2.08101 14.4381 2.88247 15.8335 4.16878 15.8335Z" />
                                     </svg>
                                     + 3.5%
                                  </span>
                                  <span>Total Orders</span>
                               </div>
                            </div>
                            <div class="crancy-progress__single circle__two" data-value="0.3"><b class="number crancy-color2">34.4%</b></div>
                         </div>
                      </div>
                      <div class="col-xl-2 col-lg-6 col-md-6 col-12 mg-top-30 mg-top-20-rs">
                         <div class="crancy-progress-card">
                            <div class="crancy-progress-card__content">
                               <h4 class="crancy-progress-card__title"><b class="count-animate">{{$productCount }}</b></h4>
                               <div class="crancy-progress-card__history">
                                  <span class="crancy-progress-card__percent  crancy-color8">
                                     <svg class="crancy-color8__fill" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M15.4308 3.30786L14.4437 3.30786L10.5548 3.30786L9.56762 3.30786C8.2813 3.30786 7.47984 4.70322 8.12798 5.81431L11.0596 10.8399C11.7027 11.9424 13.2957 11.9424 13.9389 10.8399L16.8705 5.81431C17.5186 4.70322 16.7171 3.30786 15.4308 3.30786Z" />
                                        <path opacity="0.4" d="M4.16878 15.8335L5.15594 15.8335L9.04483 15.8335L10.032 15.8335C11.3183 15.8335 12.1198 14.4381 11.4716 13.327L8.54002 8.30144C7.89689 7.19893 6.30389 7.19892 5.66076 8.30143L2.72915 13.327C2.08101 14.4381 2.88247 15.8335 4.16878 15.8335Z" />
                                     </svg>
                                     + 3.5%
                                  </span>
                                  <span>Total Products</span>
                               </div>
                            </div>
                            <div class="crancy-progress__single circle__three" data-value="0.542"><b class="number crancy-gcolor">54.2%</b></div>
                         </div>
                      </div>
                      <div class="col-xl-2 col-lg-6 col-md-6 col-12 mg-top-30 mg-top-20-rs">
                         <div class="crancy-progress-card">
                            <div class="crancy-progress-card__content">
                               <h4 class="crancy-progress-card__title"><b class="count-animate">{{ $users }}</b></h4>
                               <div class="crancy-progress-card__history">
                                  <span class="crancy-progress-card__percent  crancy-color6">
                                     <svg class="crancy-color6__fill" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M15.4308 3.30786L14.4437 3.30786L10.5548 3.30786L9.56762 3.30786C8.2813 3.30786 7.47984 4.70322 8.12798 5.81431L11.0596 10.8399C11.7027 11.9424 13.2957 11.9424 13.9389 10.8399L16.8705 5.81431C17.5186 4.70322 16.7171 3.30786 15.4308 3.30786Z" />
                                        <path opacity="0.4" d="M4.16878 15.8335L5.15594 15.8335L9.04483 15.8335L10.032 15.8335C11.3183 15.8335 12.1198 14.4381 11.4716 13.327L8.54002 8.30144C7.89689 7.19893 6.30389 7.19892 5.66076 8.30143L2.72915 13.327C2.08101 14.4381 2.88247 15.8335 4.16878 15.8335Z" />
                                     </svg>
                                     + 3.5%
                                  </span>
                                  <span>Total Users</span>
                               </div>
                            </div>
                            <div class="crancy-progress__single circle__four" data-value="0.775"><b class="number crancy-color6">77.5%</b></div>
                         </div>
                      </div>
                      <div class="col-xl-2 col-lg-6 col-md-6 col-12 mg-top-30">
                        <div class="crancy-progress-card">
                           <div class="crancy-progress-card__content">
                              <h4 class="crancy-progress-card__title"><b class="count-animate">{{ $deliveredOrdersCount }}</b></h4>
                              <div class="crancy-progress-card__history">
                                 <span class="crancy-progress-card__percent crancy-color1">
                                    <svg class="crancy-color1__fill" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                       <path d="M15.4308 3.30786L14.4437 3.30786L10.5548 3.30786L9.56762 3.30786C8.2813 3.30786 7.47984 4.70322 8.12798 5.81431L11.0596 10.8399C11.7027 11.9424 13.2957 11.9424 13.9389 10.8399L16.8705 5.81431C17.5186 4.70322 16.7171 3.30786 15.4308 3.30786Z" />
                                       <path opacity="0.4" d="M4.16878 15.8335L5.15594 15.8335L9.04483 15.8335L10.032 15.8335C11.3183 15.8335 12.1198 14.4381 11.4716 13.327L8.54002 8.30144C7.89689 7.19893 6.30389 7.19892 5.66076 8.30143L2.72915 13.327C2.08101 14.4381 2.88247 15.8335 4.16878 15.8335Z" />
                                    </svg>
                                    + 3.5%
                                 </span>
                                 <span>Order Delivered</span>
                              </div>
                           </div>
                           <div class="crancy-progress__single circle__one" data-value="0.115"><b class="number crancy-color1">11.5%</b></div>
                        </div>
                     </div>
                     <div class="col-xl-2 col-lg-6 col-md-6 col-12 mg-top-30 mg-top-20-rs">
                        <div class="crancy-progress-card">
                           <div class="crancy-progress-card__content">
                              <h4 class="crancy-progress-card__title"><b class="count-animate">{{ $payment_status }}</b></h4>
                              <div class="crancy-progress-card__history">
                                 <span class="crancy-progress-card__percent  crancy-color2">
                                    <svg class="crancy-color2__fill" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                       <path d="M15.4308 3.30786L14.4437 3.30786L10.5548 3.30786L9.56762 3.30786C8.2813 3.30786 7.47984 4.70322 8.12798 5.81431L11.0596 10.8399C11.7027 11.9424 13.2957 11.9424 13.9389 10.8399L16.8705 5.81431C17.5186 4.70322 16.7171 3.30786 15.4308 3.30786Z" />
                                       <path opacity="0.4" d="M4.16878 15.8335L5.15594 15.8335L9.04483 15.8335L10.032 15.8335C11.3183 15.8335 12.1198 14.4381 11.4716 13.327L8.54002 8.30144C7.89689 7.19893 6.30389 7.19892 5.66076 8.30143L2.72915 13.327C2.08101 14.4381 2.88247 15.8335 4.16878 15.8335Z" />
                                    </svg>
                                    + 3.5%
                                 </span>
                                 <span>Order Processing</span>
                              </div>
                           </div>
                           <div class="crancy-progress__single circle__two" data-value="0.3"><b class="number crancy-color2">34.4%</b></div>
                        </div>
                     </div>
                      
                   </div>
                   <div class="crancy-table mg-top-30">
                      <div class="crancy-table__heading">
                         <h3 class="crancy-table__title mb-0">Recent Activity</h3>
                         <ul class="nav nav-tabs  crancy-dropdown__list" id="nav-tab" role="tablist">
                            <li class="nav-item dropdown ">
                               <a class="crancy-sidebar_btn crancy-heading__tabs nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">
                                  Last 7 days 
                                  <span class="crancy-table__arrow--icon">
                                     <svg width="12" height="6" viewBox="0 0 12 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M11.7508 0.247421C11.6711 0.169022 11.5763 0.106794 11.4719 0.0643287C11.3674 0.0218632 11.2554 0 11.1423 0C11.0291 0 10.9171 0.0218632 10.8127 0.0643287C10.7082 0.106794 10.6134 0.169022 10.5338 0.247421L6.6085 4.07837C6.52883 4.15677 6.43404 4.219 6.3296 4.26146C6.22516 4.30393 6.11314 4.32579 6 4.32579C5.88686 4.32579 5.77484 4.30393 5.6704 4.26146C5.56596 4.219 5.47117 4.15677 5.3915 4.07837L1.46623 0.247421C1.38655 0.169022 1.29176 0.106794 1.18732 0.0643287C1.08289 0.0218632 0.970865 0 0.857725 0C0.744585 0 0.632564 0.0218632 0.528125 0.0643287C0.423686 0.106794 0.328896 0.169022 0.249222 0.247421C0.0895969 0.404141 0 0.616141 0 0.837119C0 1.0581 0.0895969 1.2701 0.249222 1.42682L4.18306 5.26613C4.66515 5.73605 5.31865 6 6 6C6.68135 6 7.33485 5.73605 7.81694 5.26613L11.7508 1.42682C11.9104 1.2701 12 1.0581 12 0.837119C12 0.616141 11.9104 0.404141 11.7508 0.247421Z" />
                                     </svg>
                                  </span>
                               </a>
                               <ul class="dropdown-menu crancy-sidebar_dropdown">
                                  <a class="dropdown-item list-group-item" data-bs-toggle="tab" data-bs-target="#table_1" role="tab">Last 7 days</a>
                                  <a class="dropdown-item list-group-item" data-bs-toggle="tab" data-bs-target="#table_1" role="tab">Last 15 days</a>
                                  <a class="dropdown-item list-group-item" data-bs-toggle="tab" data-bs-target="#table_1" role="tab">Last 30 days</a>
                               </ul>
                            </li>
                         </ul>
                      </div>
                      <div class="tab-content" id="myTabContent">
                         <div class="tab-pane fade show active" id="table_1" role="tabpanel" aria-labelledby="table_1">
                            <div class="crancy-table-filter mg-btm-20">
                               <div class="row">
                                  <div class="col-lg-3 col-md-6 col-12">
                                     <div class="crancy-table-filter__single crancy-table-filter__location">
                                        <label for="crancy-table-filter__label">Location</label>
                                        <select name="company_name" id="company">
                                           <option value="company" selected="selected">State or
                                              Province
                                           </option>
                                           <option>New York</option>
                                           <option>Sydney</option>
                                           <option>Dhaka</option>
                                           <option>Victoria</option>
                                        </select>
                                     </div>
                                  </div>
                                  <div class="col-lg-3 col-md-6 col-12">
                                     <div class="crancy-table-filter__single crancy-table-filter__amount">
                                        <label for="crancy-table-filter__label">Amount Spent</label>
                                        <select name="company_name" id="company">
                                           <option value="company" selected="selected">> $1,000</option>
                                           <option>> $2,000</option>
                                           <option>> $3,000</option>
                                           <option>> $4,000</option>
                                           <option>> $5,000</option>
                                        </select>
                                     </div>
                                  </div>
                                  <div class="col-lg-3 col-md-6 col-12">
                                     <div class="crancy-table-filter__single crancy-table-filter__trans-date">
                                        <label for="crancy-table-filter__label">Transaction list
                                        Date</label>
                                        <div class="crancy-table-filter__group">
                                           <input type="text" id="dateInput" placeholder="Select date">
                                           <span class="crancy-table-filter__icon"><img src="{{ asset('admin/img/calendar-icon.svg') }}"></span>
                                        </div>
                                     </div>
                                  </div>
                                  <div class="col-lg-3 col-md-6 col-12">
                                     <div class="crancy-table-filter__single crancy-table-filter__trans">
                                        <label for="crancy-table-filter__label">Type of
                                        transaction</label>
                                        <select name="company_name" id="company">
                                           <option value="company" selected="selected">All
                                              transaction
                                           </option>
                                           <option>Paypal</option>
                                           <option>Stripe</option>
                                           <option>Payoneer</option>
                                        </select>
                                     </div>
                                  </div>
                               </div>
                            </div>
                            <table id="crancy-table__main" class="crancy-table__main crancy-table__main-v1">
                               <thead class="crancy-table__head">
                                  <tr>
                                     <th class="crancy-table__column-1 crancy-table__h1">Order Id</th>
                                     <th class="crancy-table__column-2 crancy-table__h2">Prodcuts</th>
                                     <th class="crancy-table__column-3 crancy-table__h3">Date</th>
                                     <th class="crancy-table__column-4 crancy-table__h4">Customer</th>
                                     <th class="crancy-table__column-5 crancy-table__h5">Amount</th>
                                     <th class="crancy-table__column-6 crancy-table__h6">Payment by</th>
                                     <th class="crancy-table__column-7 crancy-table__h7">Status</th>
                                  </tr>
                               </thead>
                               <tbody class="crancy-table__body">
                                  <tr>
                                     <td class="crancy-table__column-1 crancy-table__data-1">
                                        <div class="crancy-table__product--id">
                                           <p class="crany-table__product--number"><a href="#">#543455</a></p>
                                        </div>
                                     </td>
                                     <td class="crancy-table__column-2 crancy-table__data-2">
                                        <div class="crancy-table__product">
                                           <div class="crancy-table__product-img">
                                              <img src="{{ asset('admin/img/table-img1.png') }}" alt="#">
                                           </div>
                                           <div class="crancy-table__product-content">
                                              <h4 class="crancy-table__product-title">Fashion
                                                 Dress
                                              </h4>
                                           </div>
                                        </div>
                                     </td>
                                     <td class="crancy-table__column-3 crancy-table__data-3">
                                        <p class="crancy-table__text crancy-table__time">2/05/2023</p>
                                     </td>
                                     <td class="crancy-table__column-4 crancy-table__data-4">
                                        <h5 class="crancy-table__inner--title">Wade Warren</h5>
                                     </td>
                                     <td class="crancy-table__column-5 crancy-table__data-5">
                                        <div class="crancy-table__amount crancy-table__text-two">
                                           <img src="{{ asset('admin/img/usd-icon.png') }}" alt="#"><span class="crancy-table__text">62.99$</span>
                                        </div>
                                     </td>
                                     <td class="crancy-table__column-6 crancy-table__data-6">
                                        <h5 class="crancy-table__inner--title">Paypal</h5>
                                     </td>
                                     <td class="crancy-table__column-7 crancy-table__data-7">
                                        <div class="crancy-table__status">Done</div>
                                     </td>
                                  </tr>
                                  <tr>
                                     <td class="crancy-table__column-1 crancy-table__data-1">
                                        <div class="crancy-table__product--id">
                                           <p class="crany-table__product--number"><a href="#">#543456</a></p>
                                        </div>
                                     </td>
                                     <td class="crancy-table__column-2 crancy-table__data-2">
                                        <div class="crancy-table__product">
                                           <div class="crancy-table__product-img">
                                              <img src="{{ asset('admin/img/table-img2.png') }}" alt="#">
                                           </div>
                                           <div class="crancy-table__product-content">
                                              <h4 class="crancy-table__product-title">Women’s
                                                 Kurta
                                              </h4>
                                           </div>
                                        </div>
                                     </td>
                                     <td class="crancy-table__column-3 crancy-table__data-3">
                                        <p class="crancy-table__text crancy-table__time">2/05/2023</p>
                                     </td>
                                     <td class="crancy-table__column-4 crancy-table__data-4">
                                        <h5 class="crancy-table__inner--title">Jerome Bell</h5>
                                     </td>
                                     <td class="crancy-table__column-5 crancy-table__data-5">
                                        <div class="crancy-table__amount crancy-table__text-two">
                                           <img src="{{ asset('admin/img/usd-icon.png') }}" alt="#"><span class="crancy-table__text">62.99$</span>
                                        </div>
                                     </td>
                                     <td class="crancy-table__column-6 crancy-table__data-6">
                                        <h5 class="crancy-table__inner--title">Paypal</h5>
                                     </td>
                                     <td class="crancy-table__column-7 crancy-table__data-7">
                                        <div class="crancy-table__status crancy-table__status--pending">
                                           Pending
                                        </div>
                                     </td>
                                  </tr>
                               </tbody>
                            </table>
                         </div>
                      </div>
                   </div>
                </div>
             </div>
          </div>
       </div>
    </div>
 </section>
 </div>

{{-- @endsection --}}
@include('admin.include.footer')