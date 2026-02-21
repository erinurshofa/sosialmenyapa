<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="<?=$assetDir?>/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">SIPEDULI</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <!-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?php //$assetDir?>/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Alexander Pierce</a>
            </div>
        </div> -->
        <div class="user-panel mt-1 pb-1 mb-1 d-flex" style="border-bottom: 1px solid rgb(255 255 255 / 12%);
    color: #fcfcfc;">
            <div class="image mt-3">
                <?php
                $model=app\models\Users::find()->where(['username'=>@Yii::$app->user->identity->username])->one();
                  if (isset($model->foto) && $model->foto !="" ){
                    // $ogimage='data:image/jpeg;base64,'.base64_encode( $model->foto );
                    $urlimage=@\yii\helpers\Url::to('@web/' . $model->foto);
                    echo '<img class="img-circle elevation-2" src='.$urlimage.' alt='.$model->nama_lengkap.'>';
                  }else{
                    echo '<img class="img-circle elevation-2" src="'.\Yii::$app->request->baseUrl.'/images/user.png" alt="User Avatar">';
                  }
                ?>
            </div>
            <div class="info" style="font-size:14px;">
                <p style="width:150px;white-space:normal;">
                <?php
                    use yii\helpers\Url;
                        if (isset(Yii::$app->user->identity->role)) {
                             echo Yii::$app->user->identity->nama_lengkap;
                         }else{
                            echo "SIMIN";
                         };
                ?>
                </br>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </p>
                
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <!-- href be escaped -->
        <!-- <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div> -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">


        <?php 
//Admin
        if (@Yii::$app->user->identity->role=="superadmin"){
          $colors = ['text-red', 'text-yellow', 'text-green', 'text-blue', 'text-purple', 'text-orange', 'text-cyan', 'text-pink']; // Array warna yang bisa dipakai
          $kecamatanList = \app\models\Kecamatan::find()->select(['nama'])->asArray()->all();

          $itemsKecamatan = [];
          $index = 0;
          foreach ($kecamatanList as $kecamatan) {
              $color = $colors[$index % count($colors)]; // Menggunakan warna secara bergantian
              $itemsKecamatan[] = [
                  'label' => strtoupper($kecamatan['nama']),
                  'icon' => 'chart-bar ' . $color,
                  'url' => ['ppks/rekapjenisppkskecamatan', 'kecamatan' => $kecamatan['nama']],
              ];
              $index++;
          }
          echo \hail812\adminlte\widgets\Menu::widget([
              // 'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
              'items' => [
                  ['label' => 'SIPEDULI', 'header' => true],
                  ['label' => 'DASHBOARD', 'icon' => 'tachometer-alt text-orange', 'url' => ['site/dashboard']],
                  [
                    'label' => 'MASTER',
                    'url' => '#',
                    'icon' => 'users text-blue',
                    'items' => [
                      ['label' => 'JENIS PMKS', 'icon' => 'book text-green', 'url' => ['jenis-pmks/index']],
                      ['label' => 'PPKS', 'icon' => 'book text-purple', 'url' => ['ppks/index']],
                      ['label' => 'LIST PPKS TERLANTAR', 'icon' => 'book text-pink', 'url' => ['ppks/list-ppks-terlantar','status'=>'terlantar']],
                    //   ['label' => 'SANTUNAN KEMATIAN', 'icon' => 'book text-red', 'url' => ['santunan-kematian/index']],
                      ['label' => 'SANTUNAN DISABILITAS', 'icon' => 'book text-yellow', 'url' => ['santunan-disabilitas/index']],
                      ['label' => 'PSM', 'icon' => 'book text-blue', 'url' => ['psm/index']],
                      ['label' => 'PSM LAMA', 'icon' => 'book text-blue', 'url' => ['psm2/index']],
                    ],
                  ],
                  [
                    'label' => 'REKAP',
                    'icon' => 'chart-bar text-orange',
                    'url' => '#',
                    'items' => [
                      ['label' => 'JENIS PMKS TOTAL', 'icon' => 'chart-bar text-red', 'url' => ['ppks/listjenispmks']],
                      ['label' => 'JENIS PMKS KOTA', 'icon' => 'chart-bar text-yellow', 'url' => ['ppks/rekapjenispmksperkecamatan']],
                      ['label' => 'PPKS KOTA SEMARANG', 'icon' => 'chart-bar text-green', 'url' => ['ppks/rekapjenisppks']],
                      // ['label' => 'Rekap PSM', 'icon' => 'book text-green', 'url' => ['psm/rekappsm']],
                    ],
                  ],
                  [
                    'label' => 'REKAP KECAMATAN',
                    'icon' => 'chart-bar text-navy',
                    'url' => '#',
                    'items' => $itemsKecamatan,
                  ],
                  ['label' => 'USERS', 'icon' => 'users text-red', 'url' => ['users/index']],
                  Yii::$app->user->isGuest ?
                  ['label' => 'Login', 'url' => ['/site/login']] :
                  ['label' => 'Logout (' . Yii::$app->user->identity->username . ')',
                      'icon'=>'sign-out-alt text-blue',
                      'url' => ['/site/logout'],'linkOptions' => ['data-method' => 'post']
                  ],
              ],
          ]);
        }

        //Admin
        if (@Yii::$app->user->identity->role=="admin"){
          $colors = ['text-red', 'text-yellow', 'text-green', 'text-blue', 'text-purple', 'text-orange', 'text-cyan', 'text-pink']; // Array warna yang bisa dipakai
          $kecamatanList = \app\models\Kecamatan::find()->select(['nama'])->asArray()->all();

          $itemsKecamatan = [];
          $index = 0;
          foreach ($kecamatanList as $kecamatan) {
              $color = $colors[$index % count($colors)]; // Menggunakan warna secara bergantian
              $itemsKecamatan[] = [
                  'label' => strtoupper($kecamatan['nama']),
                  'icon' => 'chart-bar ' . $color,
                  'url' => ['ppks/rekapjenisppkskecamatan', 'kecamatan' => $kecamatan['nama']],
              ];
              $index++;
          }
            echo \hail812\adminlte\widgets\Menu::widget([
                // 'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
                    ['label' => 'SIPEDULI', 'header' => true],
                    ['label' => 'DASHBOARD', 'icon' => 'tachometer-alt text-orange', 'url' => ['site/dashboard']],
                    [
                      'label' => 'MASTER',
                      'url' => '#',
                      'icon' => 'users text-blue',
                      'items' => [
                        ['label' => 'JENIS PMKS', 'icon' => 'book text-green', 'url' => ['jenis-pmks/index']],
                        ['label' => 'PPKS', 'icon' => 'book text-purple', 'url' => ['ppks/index']],
                        ['label' => 'LIST PPKS TERLANTAR', 'icon' => 'book text-pink', 'url' => ['ppks/list-ppks-terlantar','status'=>'terlantar']],
                        // ['label' => 'SANTUNAN KEMATIAN', 'icon' => 'book text-red', 'url' => ['santunan-kematian/index']],
                        ['label' => 'SANTUNAN DISABILITAS', 'icon' => 'book text-yellow', 'url' => ['santunan-disabilitas/index']],
                        ['label' => 'PSM', 'icon' => 'book text-blue', 'url' => ['psm/index']],
                        ['label' => 'PSM LAMA', 'icon' => 'book text-blue', 'url' => ['psm2/index']],
                      ],
                    ],
                    [
                      'label' => 'REKAP',
                      'icon' => 'chart-bar text-orange',
                      'url' => '#',
                      'items' => [
                        ['label' => 'JENIS PMKS TOTAL', 'icon' => 'chart-bar text-red', 'url' => ['ppks/listjenispmks']],
                        ['label' => 'JENIS PMKS KOTA', 'icon' => 'chart-bar text-yellow', 'url' => ['ppks/rekapjenispmksperkecamatan']],
                        ['label' => 'PPKS KOTA SEMARANG', 'icon' => 'chart-bar text-green', 'url' => ['ppks/rekapjenisppks']],
                      ],
                    ],
                    [
                      'label' => 'REKAP KECAMATAN',
                      'icon' => 'chart-bar text-navy',
                      'url' => '#',
                      'items' => $itemsKecamatan,
                    ],
                    ['label' => 'USERS', 'icon' => 'users text-red', 'url' => ['users/index']],
                    Yii::$app->user->isGuest ?
                    ['label' => 'Login', 'url' => ['/site/login']] :
                    ['label' => 'Logout (' . Yii::$app->user->identity->username . ')',
                        'icon'=>'sign-out-alt text-blue',
                        'url' => ['/site/logout'],'linkOptions' => ['data-method' => 'post']
                    ],
                ],
            ]);
        }
            if (@Yii::$app->user->identity->role=="kelurahan"){
              $kecamatan_id=@Yii::$app->user->identity->kecamatan_id;
              $kelurahan_id=@Yii::$app->user->identity->kelurahan_id;
              $role=@Yii::$app->user->identity->role;
              $pembuat=@Yii::$app->user->identity->username;
              $nama_kecamatan=strtoupper(@\app\models\Kecamatan::find()->where(['id_lama'=>$kecamatan_id])->one()->nama);
              $nama_kelurahan=strtoupper(@\app\models\Kelurahan::find()->where(['kelurahan_id'=>$kelurahan_id])->one()->nama);
              echo \hail812\adminlte\widgets\Menu::widget([
                // 'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
                    ['label' => 'SIPEDULI', 'header' => true],
                    ['label' => 'DASHBOARD', 'icon' => 'tachometer-alt text-warning', 'url' => ['site/dashboard']],
                    [
                        'label' => 'LAYANAN SOSIAL',
                        'icon' => 'hand-holding-heart text-danger',
                        'url' => '#',
                        'items' => [
                            [
                                'label' => 'PPKS',
                                'icon' => 'user-friends text-warning',
                                'url' => '#',
                                'items' => [
                                    ['label' => 'Input Pengajuan', 'icon' => 'file-alt text-success', 'url' => ['ppks/inputdatappks']],
                                    ['label' => 'Verifikasi', 'icon' => 'clipboard-check text-secondary', 'url' => ['ppks/listdata']],
                                ],
                            ],
                            // [
                            //     'label' => 'Santunan Kematian',
                            //     'icon' => 'hands-helping text-danger',
                            //     'url' => '#',
                            //     'items' => [
                            //         ['label' => 'Input Pengajuan', 'icon' => 'file-alt text-success', 'url' => ['santunan-kematian/input']],
                            //         ['label' => 'Verifikasi', 'icon' => 'clipboard-check text-secondary', 'url' => ['santunan-kematian/listdata']],
                            //     ],
                            // ],
                            [
                                'label' => 'Santunan Disabilitas',
                                'icon' => 'wheelchair text-success',
                                'url' => '#',
                                'items' => [
                                    ['label' => 'Input Pengajuan', 'icon' => 'file-alt text-success', 'url' => ['santunan-disabilitas/input']],
                                    ['label' => 'Verifikasi', 'icon' => 'clipboard-check text-secondary', 'url' => ['santunan-disabilitas/listdata']],
                                ],
                            ],
                        ],
                    ],

                    [
                        'label' => 'LIST DATA',
                        'icon' => 'folder-open text-cyan',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Data PPKS', 'icon' => 'table text-primary', 'url' => ['ppks/index', 'kecamatan' => $nama_kecamatan, 'kelurahan' => $nama_kelurahan]],
                            ['label' => 'List PPKS Terlantar', 'icon' => 'exclamation-triangle text-warning', 'url' => ['ppks/list-ppks-terlantar', 'status' => 'terlantar', 'kecamatan' => $nama_kecamatan, 'kelurahan' => $nama_kelurahan]],
                        ],
                    ],

                    [
                        'label' => 'REKAP',
                        'icon' => 'chart-pie text-warning',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Jenis PMKS Total', 'icon' => 'list-ul text-info', 'url' => ['ppks/listjenispmks']],
                            ['label' => 'Jenis PMKS Kota', 'icon' => 'city text-primary', 'url' => ['ppks/rekapjenispmksperkecamatan']],
                            ['label' => 'PPKS Kecamatan ' . $nama_kecamatan, 'icon' => 'map-marked-alt text-teal', 'url' => ['ppks/rekapjenisppkskecamatan', 'kecamatan' => $nama_kecamatan]],
                        ],
                    ],

                    ['label' => 'EDIT PROFIL', 'icon' => 'user-cog text-secondary', 'url' => ['users/edit-profile']],
                    Yii::$app->user->isGuest ?
                    ['label' => 'Login', 'url' => ['/site/login']] :
                    ['label' => 'Logout (' . Yii::$app->user->identity->username . ')',
                        'icon'=>'sign-out-alt text-blue',
                        'url' => ['/site/logout'],'linkOptions' => ['data-method' => 'post']
                    ],
                ],
            ]);
            }
                if (@Yii::$app->user->identity->role=="kecamatan"){
                  $kecamatan_id=@Yii::$app->user->identity->kecamatan_id;
                  $role=@Yii::$app->user->identity->role;
                  $pembuat=@Yii::$app->user->identity->username;
                  $nama_kecamatan=strtoupper(@\app\models\Kecamatan::find()->where(['id_lama'=>$kecamatan_id])->one()->nama);
                    echo \hail812\adminlte\widgets\Menu::widget([
                        // 'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                        'items' => [
                            ['label' => 'SIPEDULI', 'header' => true],
                            ['label' => 'DASHBOARD', 'icon' => 'tachometer-alt text-orange', 'url' => ['site/dashboard']],
                            [
                              'label' => 'LAYANAN SOSIAL',
                              'icon' => 'hand-holding-heart text-danger',
                              'url' => '#',
                              'items' => [
                                ['label' => 'Validasi PPKS', 'icon' => 'clipboard-check text-secondary', 'url' => ['ppks/listdata']],
                                ['label' => 'Input Layanan Terlantar', 'icon' => 'plus-square text-primary', 'url' => ['ppks/input-layanan-terlantar']],
                                // ['label' => 'Validasi Santunan Kematian', 'icon' => 'clipboard-check text-secondary', 'url' => ['santunan-kematian/listdata']],
                                ['label' => 'Validasi Santunan Disabilitas', 'icon' => 'clipboard-check text-secondary', 'url' => ['santunan-disabilitas/listdata']],
                              ],
                          ],
                            ['label' => 'DATA PPKS', 'icon' => 'book text-pink', 'url' => ['ppks/index','status'=>'terlantar', 'kecamatan' => $nama_kecamatan]],
                            ['label' => 'LIST PPKS TERLANTAR', 'icon' => 'book text-green', 'url' => ['ppks/list-ppks-terlantar','status'=>'terlantar', 'kecamatan' => $nama_kecamatan]],
                            [
                              'label' => 'Master',
                              'url' => '#',
                              'icon' => 'users text-blue',
                              'items' => [
                                ['label' => 'PPKS', 'icon' => 'book text-green', 'url' => ['ppks/index']],

                                ['label' => 'PSM', 'icon' => 'book text-blue', 'url' => ['psm/index']],
                              ],
                            ],
                            [
                              'label' => 'REKAP',
                              'icon' => 'chart-bar text-orange',
                              'url' => '#',
                              'items' => [
                                ['label' => 'JENIS PMKS TOTAL', 'icon' => 'chart-bar text-red', 'url' => ['ppks/listjenispmks']],
                                ['label' => 'JENIS PMKS KOTA', 'icon' => 'chart-bar text-yellow', 'url' => ['ppks/rekapjenispmksperkecamatan']],
                                ['label' => 'PPKS KOTA SEMARANG', 'icon' => 'chart-bar text-green', 'url' => ['ppks/rekapjenisppks']],
                                ['label' => 'PPKS KECAMATAN '.$nama_kecamatan, 'icon' => 'chart-bar text-green', 'url' => ['ppks/rekapjenisppkskecamatan', 'kecamatan' => $nama_kecamatan]],
                                // ['label' => 'Rekap PSM', 'icon' => 'book text-green', 'url' => ['psm/rekappsm']],
                              ],
                            ],
                            ['label' => 'EDIT PROFIL', 'icon' => 'users text-red', 'url' => ['users/edit-profile']],
                            Yii::$app->user->isGuest ?
                            ['label' => 'Login', 'url' => ['/site/login']] :
                            ['label' => 'Logout (' . Yii::$app->user->identity->username . ')',
                                'icon'=>'sign-out-alt text-blue',
                                'url' => ['/site/logout'],'linkOptions' => ['data-method' => 'post']
                            ],
                        ],
                    ]);
                }
                    if (@Yii::$app->user->identity->role=="dinsos"){
                      $colors = ['text-red', 'text-yellow', 'text-green', 'text-blue', 'text-purple', 'text-orange', 'text-cyan', 'text-pink']; // Array warna yang bisa dipakai
                      $kecamatanList = \app\models\Kecamatan::find()->select(['nama'])->asArray()->all();

                      $itemsKecamatan = [];
                      $index = 0;
                      foreach ($kecamatanList as $kecamatan) {
                          $color = $colors[$index % count($colors)]; // Menggunakan warna secara bergantian
                          $itemsKecamatan[] = [
                              'label' => strtoupper($kecamatan['nama']),
                              'icon' => 'chart-bar ' . $color,
                              'url' => ['ppks/rekapjenisppkskecamatan', 'kecamatan' => $kecamatan['nama']],
                          ];
                          $index++;
                      }
                        echo \hail812\adminlte\widgets\Menu::widget([
                            // 'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                            'items' => [
                                ['label' => 'SIPEDULI', 'header' => true],
                                ['label' => 'DASHBOARD', 'icon' => 'tachometer-alt text-orange', 'url' => ['site/dashboard']],
                                [
                                  'label' => 'Perlu Di Proses',
                                  'url' => '#',
                                  'icon' => 'users text-green',
                                  'items' => [
                                    ['label' => 'APPROVE PPKS', 'icon' => 'book text-red', 'url' => ['ppks/listdata']],
                                    ['label' => 'Konfirmasi Pemutakhiran', 'icon' => 'sync-alt text-primary', 'url' => ['ppks/konfirmasi-mutakhir']],
                                    ['label' => 'Input Layanan Terlantar', 'icon' => 'plus-square text-success', 'url' => ['ppks/input-layanan-terlantar']],
                                    ['label' => 'APPROVE PSM', 'icon' => 'book text-orange', 'url' => ['psm/listpsm']],
                                    // ['label' => 'Validasi Santunan Kematian', 'icon' => 'clipboard-check text-green', 'url' => ['santunan-kematian/listdata']],
                                    ['label' => 'Validasi Santunan Disabilitas', 'icon' => 'clipboard-check text-blue', 'url' => ['santunan-disabilitas/listdata']],
                                  ],   
                                ],
                                [
                                  'label' => 'Master',
                                  'url' => '#',
                                  'icon' => 'users text-blue',
                                  'items' => [
                                    ['label' => 'PPKS', 'icon' => 'book text-green', 'url' => ['ppks/index']],
                                    ['label' => 'LIST PPKS TERLANTAR', 'icon' => 'book text-green', 'url' => ['ppks/list-ppks-terlantar','status'=>'terlantar']],
                                    ['label' => 'PSM', 'icon' => 'book text-blue', 'url' => ['psm/index']],
                                  ],
                                ],
                                [
                                  'label' => 'REKAP',
                                  'icon' => 'chart-bar text-orange',
                                  'url' => '#',
                                  'items' => [
                                    ['label' => 'JENIS PMKS TOTAL', 'icon' => 'chart-bar text-red', 'url' => ['ppks/listjenispmks']],
                                    ['label' => 'JENIS PMKS KOTA', 'icon' => 'chart-bar text-yellow', 'url' => ['ppks/rekapjenispmksperkecamatan']],
                                    ['label' => 'PPKS KOTA SEMARANG', 'icon' => 'chart-bar text-green', 'url' => ['ppks/rekapjenisppks']],
                                    // ['label' => 'Rekap PSM', 'icon' => 'book text-green', 'url' => ['psm/rekappsm']],
                                  ],
                                ],
                                [
                                  'label' => 'REKAP KECAMATAN',
                                  'icon' => 'chart-bar text-navy',
                                  'url' => '#',
                                  'items' => $itemsKecamatan,
                                ],
                                ['label' => 'USERS', 'icon' => 'users text-red', 'url' => ['users/index']],
                                Yii::$app->user->isGuest ?
                                ['label' => 'Login', 'url' => ['/site/login']] :
                                ['label' => 'Logout (' . Yii::$app->user->identity->username . ')',
                                    'icon'=>'sign-out-alt text-blue',
                                    'url' => ['/site/logout'],'linkOptions' => ['data-method' => 'post']
                                ],
                            ],
                        ]);
                    }
                        if (@Yii::$app->user->identity->role=="psm"){
                            echo \hail812\adminlte\widgets\Menu::widget([
                                // 'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                                'items' => [
                                    ['label' => 'SIPEDULI', 'header' => true],
                                    ['label' => 'DASHBOARD', 'icon' => 'tachometer-alt text-orange', 'url' => ['site/dashboard']],
                                    [
                                      'label' => 'LAYANAN SOSIAL',
                                      'icon' => 'hand-holding-heart text-danger',
                                      'url' => '#',
                                      'items' => [
                                          ['label' => 'Input PPKS', 'icon' => 'file-alt text-warning', 'url' => ['ppks/inputdatappks']],
                                          ['label' => 'Pemutakhiran Data', 'icon' => 'sync-alt text-info', 'url' => ['ppks/list-mutakhir-psm']],
                                        //   ['label' => 'Santunan Kematian', 'icon' => 'file-alt text-red', 'url' => ['santunan-kematian/create']],
                                          ['label' => 'Santunan Disabilitas', 'icon' => 'file-alt text-success', 'url' => ['santunan-disabilitas/create']],
                                      ],
                                  ],
                                   
                                    [
                                      'label' => 'REKAP',
                                      'icon' => 'chart-bar text-orange',
                                      'url' => '#',
                                      'items' => [
                                        ['label' => 'JENIS PMKS TOTAL', 'icon' => 'chart-bar text-red', 'url' => ['ppks/listjenispmks']],
                                        ['label' => 'JENIS PMKS KOTA', 'icon' => 'chart-bar text-yellow', 'url' => ['ppks/rekapjenispmksperkecamatan']],
                                        // ['label' => 'Rekap PSM', 'icon' => 'book text-green', 'url' => ['psm/rekappsm']],
                                      ],
                                    ],
                                    ['label' => 'EDIT PROFIL', 'icon' => 'users text-red', 'url' => ['users/edit-profile']],
                                    Yii::$app->user->isGuest ?
                                    ['label' => 'Login', 'url' => ['/site/login']] :
                                    ['label' => 'Logout (' . Yii::$app->user->identity->username . ')',
                                        'icon'=>'sign-out-alt text-blue',
                                        'url' => ['/site/logout'],'linkOptions' => ['data-method' => 'post']
                                    ],
                                ],
                            ]);
        };?>
            <?php
            // echo \hail812\adminlte\widgets\Menu::widget([
            //     'items' => [
            //         // [
            //         //     'label' => 'Starter Pages',
            //         //     'icon' => 'tachometer-alt',
            //         //     'badge' => '<span class="right badge badge-info">2</span>',
            //         //     'items' => [
            //         //         ['label' => 'Active Page', 'url' => ['site/index'], 'iconStyle' => 'far'],
            //         //         ['label' => 'Inactive Page', 'iconStyle' => 'far'],
            //         //     ]
            //         // ],
            //         // ['label' => 'Simple Link', 'icon' => 'th', 'badge' => '<span class="right badge badge-danger">New</span>'],
            //         ['label' => 'Yii2 PROVIDED', 'header' => true],
            //         ['label' => 'Login', 'url' => ['site/login'], 'icon' => 'sign-in-alt', 'visible' => Yii::$app->user->isGuest],
            //         ['label' => 'Gii',  'icon' => 'file-code', 'url' => ['/gii'], 'target' => '_blank'],
            //         // ['label' => 'Debug', 'icon' => 'bug', 'url' => ['/debug'], 'target' => '_blank'],
            //         // ['label' => 'MULTI LEVEL EXAMPLE', 'header' => true],
            //         // ['label' => 'Level1'],
            //         // [
            //         //     'label' => 'Level1',
            //         //     'items' => [
            //         //         ['label' => 'Level2', 'iconStyle' => 'far'],
            //         //         [
            //         //             'label' => 'Level2',
            //         //             'iconStyle' => 'far',
            //         //             'items' => [
            //         //                 ['label' => 'Level3', 'iconStyle' => 'far', 'icon' => 'dot-circle'],
            //         //                 ['label' => 'Level3', 'iconStyle' => 'far', 'icon' => 'dot-circle'],
            //         //                 ['label' => 'Level3', 'iconStyle' => 'far', 'icon' => 'dot-circle']
            //         //             ]
            //         //         ],
            //         //         ['label' => 'Level2', 'iconStyle' => 'far']
            //         //     ]
            //         // ],
            //         // ['label' => 'Level1'],
            //         // ['label' => 'LABELS', 'header' => true],
            //         // ['label' => 'Important', 'iconStyle' => 'far', 'iconClassAdded' => 'text-danger'],
            //         // ['label' => 'Warning', 'iconClass' => 'nav-icon far fa-circle text-warning'],
            //         // ['label' => 'Informational', 'iconStyle' => 'far', 'iconClassAdded' => 'text-info'],
            //     ],
            // ]);
            ?>
        <?php
        if (@Yii::$app->user->identity->role == "among_jiwo") {
            echo \hail812\adminlte\widgets\Menu::widget([
                'items' => [
                    ['label' => 'SIPEDULI', 'header' => true],
                    ['label' => 'DASHBOARD', 'icon' => 'tachometer-alt text-orange', 'url' => ['site/dashboard']],
                    [
                        'label' => 'LAYANAN SOSIAL',
                        'icon' => 'hand-holding-heart text-danger',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Input Data Terlantar', 'icon' => 'file-alt text-warning', 'url' => ['ppks/inputdatappks']],
                            ['label' => 'Input Layanan Terlantar', 'icon' => 'plus-square text-primary', 'url' => ['ppks/input-layanan-terlantar']],
                            ['label' => 'Input Data Korban Bencana', 'icon' => 'file-alt text-danger', 'url' => ['bencana-korban-individu/index']],
                            ['label' => 'Input Layanan Bencana', 'icon' => 'plus-square text-danger', 'url' => ['bencana-layanan/index']],
                        ],
                    ],
                    ['label' => 'EDIT PROFIL', 'icon' => 'user-cog text-secondary', 'url' => ['users/edit-profile']],
                    Yii::$app->user->isGuest ?
                    ['label' => 'Login', 'url' => ['/site/login']] :
                    ['label' => 'Logout (' . Yii::$app->user->identity->username . ')',
                        'icon' => 'sign-out-alt text-blue',
                        'url' => ['/site/logout'], 'linkOptions' => ['data-method' => 'post']
                    ],
                ]
            ]);
        }
        ?>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>