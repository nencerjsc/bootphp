<div id="sidebar" class="sidebar">
    <div class="sidebar-overlay"></div>
    <div class="sidebar-logo" style="height: 61px;">
        <a class="navbar-brand mr-0 d-inline-block" href="{{url('/')}}"
           style="background-image: url('./assets/images/logo.png')"></a>
    </div>
    <div class="navbar p-0">
        <ul class="nav w-100 flex-column" id="navigation">
            <li class="nav-item">
                <a href="dashboard.html" class="nav-link">
                    <i class="fas fa-tachometer-alt"></i>
                    <span class="ml-2">Bảng quản trị</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="#credit-card" class="nav-link" data-toggle="collapse">
                    <i class="fas fa-credit-card"></i>
                    <span class="ml-2">Mã thẻ cào</span>
                </a>
                <div class="collapse" id="credit-card" data-parent="#navigation">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="softcard_orders.html">
                                <i class="fal fa-angle-right mr-2"></i>Đơn hàng mua thẻ
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="softcard.html">
                                <i class="fal fa-angle-right mr-2"></i>Sản phẩm
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="stockcards.html">
                                <i class="fal fa-angle-right mr-2"></i>Kho
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="stockcards_setting.html">
                                <i class="fal fa-angle-right mr-2"></i>Cấu hình kho
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a href="mtopup.html" class="nav-link">
                    <i class="fas fa-phone-square fa-rotate-90"></i>
                    <span class="ml-2">Nạp cước</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="chargings.html" class="nav-link">
                    <i class="fas fa-sync-alt fa-rotate-90"></i>
                    <span class="ml-2">Đổi thẻ cào</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="#statistical" class="nav-link" data-toggle="collapse">
                    <i class="fas fa-chart-bar"></i>
                    <span class="ml-2">Thống kê</span>
                </a>
                <div class="collapse" id="statistical" data-parent="#navigation">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="statistical_charging.html">
                                <i class="fal fa-angle-right mr-2"></i>Thống kê đổi thẻ
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="statistical_mtopup.html">
                                <i class="fal fa-angle-right mr-2"></i>Thống kê nạp cước
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="statistical_softcard.html">
                                <i class="fal fa-angle-right mr-2"></i>Thống kê bán thẻ
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="stockcards_stockcard.html">
                                <i class="fal fa-angle-right mr-2"></i>Thống kê kho thẻ
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="stockcards_deposit.html">
                                <i class="fal fa-angle-right mr-2"></i>Thống kê nạp tiền
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="stockcards_withdraw.html">
                                <i class="fal fa-angle-right mr-2"></i>Thống kê rút tiền
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="stockcards_dailystat.html">
                                <i class="fal fa-angle-right mr-2"></i>Tổng hợp ngày
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="stockcards_user.html">
                                <i class="fal fa-angle-right mr-2"></i>Sản lượng thành viên
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a href="news.html" class="nav-link">
                    <i class="fas fa-newspaper"></i>
                    <span class="ml-2">Tin tức</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="#users" class="nav-link" data-toggle="collapse">
                    <i class="fas fa-users"></i>
                    <span class="ml-2">Tài khoản</span>
                </a>
                <div class="collapse" id="users" data-parent="#navigation">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="users.html">
                                <i class="fal fa-angle-right mr-2"></i>Người dùng
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="groups.html">
                                <i class="fal fa-angle-right mr-2"></i>Nhóm
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="roles.html">
                                <i class="fal fa-angle-right mr-2"></i>Vai trò
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="permissions.html">
                                <i class="fal fa-angle-right mr-2"></i>Quyền hạn
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="login-logs.html">
                                <i class="fal fa-angle-right mr-2"></i>Lịch sử đăng nhập
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a href="#wallet" class="nav-link" data-toggle="collapse">
                    <i class="fas fa-wallet"></i>
                    <span class="ml-2">Ví điện tử</span>
                </a>
                <div class="collapse" id="wallet" data-parent="#navigation">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="wallets.html">
                                <i class="fal fa-angle-right mr-2"></i>Danh sách ví
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="wallets_orderdeposit.html">
                                <i class="fal fa-angle-right mr-2"></i>Đơn nạp tiền
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="wallets_orderwithdraw.html">
                                <i class="fal fa-angle-right mr-2"></i>Đơn rút tiền
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="wallets_transaction.html">
                                <i class="fal fa-angle-right mr-2"></i>Lịch sử ví
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a href="banking.html" class="nav-link">
                    <i class="fas fa-university"></i>
                    <span class="ml-2">Ngân hàng</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="#sms" class="nav-link" data-toggle="collapse">
                    <i class="fas fa-envelope"></i>
                    <span class="ml-2">SMS</span>
                </a>
                <div class="collapse" id="sms" data-parent="#navigation">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="sms.html">
                                <i class="fal fa-angle-right mr-2"></i>Lịch sử SMS
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="sms_provider.html">
                                <i class="fal fa-angle-right mr-2"></i>Cấu hình SMS
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a href="#tool" class="nav-link" data-toggle="collapse">
                    <i class="fas fa-wrench"></i>
                    <span class="ml-2">Công cụ</span>
                </a>
                <div class="collapse" id="tool" data-parent="#navigation">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="seo.html">
                                <i class="fal fa-angle-right mr-2"></i>Seo onepage
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="tool.html">
                                <i class="fal fa-angle-right mr-2"></i>Xoá dữ liệu
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a href="#module" class="nav-link" data-toggle="collapse">
                    <i class="fas fa-cubes"></i>
                    <span class="ml-2">Module khác</span>
                </a>
                <div class="collapse" id="module" data-parent="#navigation">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="menu.html">
                                <i class="fal fa-angle-right mr-2"></i>Menu
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="pages.html">
                                <i class="fal fa-angle-right mr-2"></i>Trang tĩnh
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="sliders.html">
                                <i class="fal fa-angle-right mr-2"></i>Trình diễn ảnh
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="webdata.html">
                                <i class="fal fa-angle-right mr-2"></i>Webdata
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="twofactor.html">
                                <i class="fal fa-angle-right mr-2"></i>Mã bảo mật
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="banners.html">
                                <i class="fal fa-angle-right mr-2"></i>Trao đổi banner
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="merchants.html">
                                <i class="fal fa-angle-right mr-2"></i>Đối tác kết nối
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a href="#config" class="nav-link" data-toggle="collapse">
                    <i class="fas fa-cogs"></i>
                    <span class="ml-2">Cấu hình hệ thống</span>
                </a>
                <div class="collapse" id="config" data-parent="#navigation">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="settings.html">
                                <i class="fal fa-angle-right mr-2"></i>Cài đặt
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="currencies.html">
                                <i class="fal fa-angle-right mr-2"></i>Tiền tệ
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="paygates.html">
                                <i class="fal fa-angle-right mr-2"></i>Cổng thanh toán
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="language.html">
                                <i class="fal fa-angle-right mr-2"></i>Ngôn ngữ
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="sendmail.html">
                                <i class="fal fa-angle-right mr-2"></i>Cấu hình mail
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</div>
