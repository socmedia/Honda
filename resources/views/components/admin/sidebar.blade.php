<aside class="left-sidebar" data-sidebarbg="skin6">
    <div class="scroll-sidebar">
        <nav class="sidebar-nav">
            <ul id="sidebarnav">

                <li class="sidebar-item pt-2">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link {{request()->routeIs('adm.dashboard.*') ? 'active' : ''}}"
                        href="{{route('adm.dashboard.index')}}" aria-expanded="false">
                        <i class="far fa-chart-bar" aria-hidden="true"></i>
                        <span class="hide-menu">Dashboard</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link {{request()->routeIs('adm.banner.*') ? 'active' : ''}}"
                        href="{{route('adm.banner.index')}}" aria-expanded="false">
                        <i class="fas fa-images" aria-hidden="true"></i>
                        <span class="hide-menu">Banner</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link {{request()->routeIs('adm.product.*') ? 'active' : ''}}"
                        href="{{route('adm.product.index')}}" aria-expanded="false">
                        <i class="fas fa-motorcycle" aria-hidden="true"></i>
                        <span class="hide-menu">Produk</span>
                    </a>
                </li>

                <li class="nav-small-cap pl-4">
                    <span class="hide-menu">Honda Jateng</span>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link {{request()->routeIs('adm.dealer.*') ? 'active' : ''}}"
                        href="{{route('adm.dealer.index')}}" aria-expanded="false">
                        <i class="fas fa-warehouse"></i>
                        <span class="hide-menu">Dealer</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link {{request()->routeIs('adm.ahass.*') ? 'active' : ''}}"
                        href="{{route('adm.ahass.index')}}" aria-expanded="false">
                        <i class="fas fa-wrench"></i>
                        <span class="hide-menu">Ahass</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link {{request()->routeIs('adm.lead.*') ? 'active' : ''}}"
                        href="{{route('adm.lead.index')}}" aria-expanded="false">
                        <i class="fas fa-file-alt"></i>
                        <span class="hide-menu">Lead</span>
                    </a>
                </li>

                <li class="nav-small-cap pl-4">
                    <span class="hide-menu">Purna Jual</span>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link {{request()->routeIs('adm.hgp.*') ? 'active' : ''}}"
                        href="{{route('adm.hgp.index')}}" aria-expanded="false">
                        <i class="fas fa-cogs"></i>
                        <span class="hide-menu">Genuine Parts</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link {{request()->routeIs('adm.apparel.*') ? 'active' : ''}}"
                        href="{{route('adm.apparel.index')}}" aria-expanded="false">
                        <svg width="18" aria-hidden="true" focusable="false" class="mx-2" role="img"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512">
                            <path fill="currentColor"
                                d="M631.2 96.5L436.5 0C416.4 27.8 371.9 47.2 320 47.2S223.6 27.8 203.5 0L8.8 96.5c-7.9 4-11.1 13.6-7.2 21.5l57.2 114.5c4 7.9 13.6 11.1 21.5 7.2l56.6-27.7c10.6-5.2 23 2.5 23 14.4V480c0 17.7 14.3 32 32 32h256c17.7 0 32-14.3 32-32V226.3c0-11.8 12.4-19.6 23-14.4l56.6 27.7c7.9 4 17.5.8 21.5-7.2L638.3 118c4-7.9.8-17.6-7.1-21.5z">
                            </path>
                        </svg>
                        <span class="hide-menu">Apparel</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link {{request()->routeIs('adm.accessories.*') ? 'active' : ''}}"
                        href="{{route('adm.accessories.index')}}" aria-expanded="false">
                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none" class="mx-2"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M0 13.8692V13.8648C0.0184948 13.8666 0.0382523 13.8679 0.0593553 13.8686C0.410507 13.8799 0.405273 13.709 0.399362 13.5161C0.398297 13.4814 0.397211 13.4459 0.398179 13.4107C0.399478 13.3645 0.402486 13.3183 0.405493 13.2721C0.409828 13.2055 0.414161 13.1389 0.413366 13.0723C0.40856 12.6631 0.488725 12.3731 1.00066 12.5825C1.13657 12.6381 1.28604 12.6373 1.32141 12.4214C1.35326 12.2272 1.24169 12.2113 1.12766 12.195L1.12765 12.195C1.103 12.1915 1.07823 12.1879 1.05478 12.1826C1.03938 12.1791 1.02398 12.1744 1.00858 12.1697C0.977186 12.1602 0.945818 12.1507 0.914537 12.1511C0.573695 12.1556 0.535439 11.9949 0.618391 11.6945C0.755939 11.1971 0.900119 10.7041 1.10418 10.2299L1.10473 10.2286C1.35468 9.64795 1.35759 9.64119 1.93168 9.91984C2.06798 9.98602 2.14555 10.0218 2.24177 9.86587C2.34221 9.70309 2.2682 9.63595 2.1392 9.56783C2.10453 9.54952 2.07136 9.52785 2.03823 9.5062L2.03823 9.5062C1.99037 9.47492 1.94262 9.44372 1.89064 9.42288C1.63842 9.32182 1.60016 9.19896 1.76953 8.96342L1.86919 8.82434C2.11693 8.47807 2.36429 8.13232 2.65479 7.82086C2.70286 7.76928 2.74883 7.71063 2.79509 7.65159C2.92569 7.48492 3.05865 7.31524 3.24795 7.29356C3.38041 7.27839 3.47344 7.42115 3.56695 7.56465C3.61018 7.63097 3.6535 7.69745 3.70087 7.74857C3.79507 7.85041 3.85908 7.87967 3.97568 7.77929C4.09996 7.67232 4.11447 7.58405 3.99923 7.46565C3.96369 7.42916 3.93232 7.38839 3.90099 7.34766L3.90098 7.34766L3.90098 7.34765C3.86333 7.29871 3.82573 7.24984 3.78103 7.20859C3.57697 7.02023 3.59273 6.87925 3.83419 6.73352C4.00486 6.63051 4.17166 6.52084 4.33844 6.41119L4.33846 6.41118C4.54626 6.27456 4.75402 6.13797 4.96918 6.01429C5.0028 5.99496 5.0369 5.9749 5.07136 5.95461L5.07137 5.95461C5.30436 5.81749 5.5544 5.67034 5.79379 5.67245C5.90788 5.67343 5.95279 5.85405 5.9986 6.03826C6.02098 6.12828 6.04357 6.21916 6.07456 6.29034C6.13137 6.42085 6.21557 6.44914 6.34177 6.40079C6.46913 6.35206 6.51373 6.27871 6.45375 6.14306C6.43096 6.09147 6.4148 6.03657 6.39869 5.98178C6.37818 5.91206 6.35772 5.84253 6.3237 5.78029C6.18664 5.52963 6.26478 5.41695 6.52738 5.35038C7.10218 5.20475 7.68121 5.09991 8.26898 5.01687C8.73478 4.95108 8.86435 5.09962 8.8162 5.5399C8.81382 5.56164 8.80911 5.58628 8.80412 5.61235C8.77776 5.75009 8.7438 5.92751 9.00834 5.92563C9.23623 5.92406 9.22321 5.79349 9.21042 5.66531C9.20588 5.61979 9.20137 5.57457 9.20769 5.53554C9.22288 5.44117 9.2175 5.34185 9.2101 5.24564C9.19645 5.06697 9.2447 4.988 9.44934 5.00147C10.1712 5.04904 10.8775 5.17074 11.5698 5.38264C11.7427 5.43545 11.8019 5.51248 11.7197 5.68718C11.6859 5.75913 11.6612 5.83534 11.6365 5.91163L11.6365 5.91164L11.6365 5.91165C11.6215 5.95813 11.6064 6.00464 11.5893 6.05024C11.5829 6.06716 11.5759 6.08405 11.569 6.1008L11.569 6.10083C11.5208 6.21709 11.4752 6.32708 11.6651 6.40118C11.8681 6.48039 11.9125 6.35164 11.9614 6.21026L11.9633 6.20478C11.9764 6.16677 11.9922 6.12934 12.008 6.09195C12.0365 6.02468 12.0648 5.95754 12.0776 5.88736C12.1292 5.60317 12.2669 5.62081 12.4815 5.72642C12.9418 5.95276 13.3942 6.18976 13.8179 6.48131L13.8245 6.48583C14.394 6.87772 14.3984 6.88078 14.0133 7.45663C13.9285 7.58347 13.8949 7.66118 14.0284 7.77725C14.1767 7.90622 14.2499 7.8226 14.3348 7.71263C14.3577 7.68298 14.3833 7.65507 14.4087 7.6272L14.4087 7.6272C14.4489 7.58331 14.4889 7.53955 14.5183 7.48929C14.6772 7.2177 14.8179 7.24357 15.0226 7.46206C15.397 7.86174 15.7369 8.28701 16.0761 8.71624C16.3707 9.08908 16.4312 9.35767 15.9103 9.54613C15.7717 9.59632 15.6512 9.67906 15.7653 9.86975C15.8717 10.0475 15.9789 9.98084 16.091 9.9111C16.1016 9.90448 16.1123 9.89783 16.1231 9.89136C16.1329 9.88545 16.1433 9.88027 16.1536 9.8751C16.1722 9.86584 16.1907 9.8566 16.2058 9.8433C16.5351 9.5532 16.6945 9.68449 16.8338 10.0531C17.0101 10.5196 17.18 10.9864 17.3331 11.4617C17.4725 11.8944 17.4873 12.1984 16.9123 12.1916C16.7713 12.1899 16.6684 12.232 16.6935 12.4205C16.7175 12.6003 16.8185 12.6457 16.9567 12.591C17.5551 12.3541 17.6151 12.7049 17.5921 13.1635C17.5891 13.2215 17.5931 13.2799 17.5971 13.3383C17.602 13.4094 17.6069 13.4804 17.5992 13.5501C17.5684 13.8285 17.7157 13.8536 17.9428 13.861C17.963 13.8616 17.982 13.8617 18 13.8612V13.8692H8.89538C9.21234 13.8637 9.49474 13.7435 9.62949 13.4634C9.77677 13.1576 10.0155 12.9559 10.2569 12.752C10.2886 12.7252 10.3203 12.6984 10.3519 12.6714C10.8195 12.2703 11.2886 11.8709 11.7576 11.4716C12.1722 11.1186 12.5868 10.7657 13.0003 10.4115C13.0185 10.396 13.0383 10.3805 13.0584 10.3647C13.178 10.2708 13.3103 10.167 13.1833 9.99457C13.0608 9.82813 12.9156 9.91334 12.7837 9.99078C12.7618 10.0036 12.7403 10.0162 12.7193 10.0275C11.6203 10.6157 10.5225 11.2063 9.42584 11.7988C9.20959 11.9156 9.00034 12.0128 8.74039 12.0367C8.24669 12.0819 7.91276 12.5198 7.94279 13.0076C7.97284 13.4942 8.35904 13.8603 8.84921 13.8692H0Z"
                                fill="#54667A" />
                        </svg>


                        <span class="hide-menu">Accessories</span>
                    </a>
                </li>

                <li class="nav-small-cap pl-4">
                    <span class="hide-menu">Berita</span>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link {{request()->routeIs('adm.promo.*') ? 'active' : ''}}"
                        href="{{route('adm.promo.index')}}" aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                            aria-hidden="true" focusable="false" width="18px" height="18px" class="mx-2"
                            style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);"
                            preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24">
                            <path
                                d="M4 4a2 2 0 0 0-2 2v4a2 2 0 0 1 2 2a2 2 0 0 1-2 2v4a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-4a2 2 0 0 1-2-2a2 2 0 0 1 2-2V6a2 2 0 0 0-2-2H4m11.5 3L17 8.5L8.5 17L7 15.5L15.5 7m-6.69.04c.98 0 1.77.79 1.77 1.77a1.77 1.77 0 0 1-1.77 1.77c-.98 0-1.77-.79-1.77-1.77a1.77 1.77 0 0 1 1.77-1.77m6.38 6.38c.98 0 1.77.79 1.77 1.77a1.77 1.77 0 0 1-1.77 1.77c-.98 0-1.77-.79-1.77-1.77a1.77 1.77 0 0 1 1.77-1.77z"
                                fill="#626262" />
                        </svg>
                        <span class="hide-menu">Promo & Kegiatan</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link {{request()->routeIs('adm.article.*') ? 'active' : ''}}"
                        href="{{route('adm.article.index')}}" aria-expanded="false">
                        <i class="fas fa-book"></i>
                        <span class="hide-menu">Artikel</span>
                    </a>
                </li>

            </ul>
        </nav>
    </div>
</aside>