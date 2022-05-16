@section("name", trans("page.{$menu_name}"))
@section("icon", $menu_icon)

@section("{$menu_slug}-active", "active")

<div>
    <section class="our__about__area bg__white pb--80 pt--100">
        <div class="container">
            <div class="row about__wrapper">
                <div class="about">
                    <div class="section__title text-left">
                        <h2 class="title__line">{{ trans("general.Scholarships Scheme") }}</h2>
                        <p>{{ trans("general.Harvest Education Assistance Program") }}</p>
                    </div>
                </div>
                <div class="col-12">
                    <div class="about">
                        <p class="about__details">Bantuan Pendidikan Harvest (BPH) diberikan kepada calon mahasiswa yang berhasil mendapatkan nilai memuaskan dalam Ujian Saringan Masuk STMIK Harvest. Bagi calon mahasiswa memiliki prestasi akademik di kelas maka bisa mendapatkan kesempatan potongan uang pangkal melalui jalur prestasi. Beasiswa diberikan mulai dari 25% hingga 100%.</p>
                    </div>
                    <div class="about__thumb mt-3">
                        <img draggable="false" class="img-fluid w-100" src="{{ asset("images/scholarship/scholarship.webp") }}" alt="{{ trans("page.Scholarship") }} - 2 - {{ env("APP_TITLE") }}">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="our__about__area bg__white pb--80 pt--100 bg-light">
        <div class="container">
            <div class="row about__wrapper">
                <div class="about">
                    <div class="section__title text-left">
                        <h2 class="title__line">{{ trans("general.Reduction of Base Fee (UB)") }}</h2>
                        <p>{{ trans("general.Selection Path (KUP)") }}</p>
                    </div>
                </div>
                <div class="col-12">
                    <div class="about">
                        <p class="about__details">
                            1.Proses Saringan Masuk STMIK Harvest.<br>
                            2.Jalur Prestasi Kelas: Potongan diberikan berdasarkan peringkat di kelas selama Kelas X - XII.<br>
                            <br>
                            Besarnya keringanan berupa pemotongan uang pangkal, berdasarkan table di bawah ini:
                        </p>
                        <div class="table-responsive mt-3">
                            <table class="table table-striped table-hover table-bordered text-nowrap table-responsive align-middle text-center">
                                <thead>
                                    <tr class="bg-success text-white text-center">
                                        <th>Hasil Saringan Masuk <br> / Preastasi Kelas</th>
                                        <th>Besaran Potongan<br> Uang Pangkal</th>
                                        <th>Uang Pangkal<br> Yang Dibayarkan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>I</td>
                                        <td>100%</td>
                                        <td>GRATIS</td>
                                    </tr>
                                    <tr>
                                        <td>II</td>
                                        <td>90%</td>
                                        <td>Rp. 1.000.000,-</td>
                                    </tr>
                                    <tr>
                                        <td>III</td>
                                        <td>80%</td>
                                        <td>Rp. 2.000.000,-</td>
                                    </tr>
                                    <tr>
                                        <td>IV</td>
                                        <td>70%</td>
                                        <td>Rp. 3.000.000,-</td>
                                    </tr>
                                    <tr>
                                        <td>V</td>
                                        <td>60%</td>
                                        <td>Rp. 4.000.000,-</td>
                                    </tr>
                                    <tr>
                                        <td>VI</td>
                                        <td>50%</td>
                                        <td>Rp. 5.000.000,-</td>
                                    </tr>
                                    <tr>
                                        <td>VII</td>
                                        <td>40%</td>
                                        <td>Rp. 6.000.000,-</td>
                                    </tr>
                                    <tr>
                                        <td>VIII</td>
                                        <td>30%</td>
                                        <td>Rp. 7.000.000,-</td>
                                    </tr>
                                    <tr>
                                        <td>IX</td>
                                        <td>20%</td>
                                        <td>Rp. 8.000.000,-</td>
                                    </tr>
                                    <tr>
                                        <td>X</td>
                                        <td>10%</td>
                                        <td>Rp. 9.000.000,-</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="our__about__area bg__white pb--80 pt--100">
        <div class="container">
            <div class="row about__wrapper">
                <div class="about">
                    <div class="section__title text-left">
                        <h2 class="title__line">{{ trans("general.Tuition Reduction (TR)") }}</h2>
                        <p>{{ trans("general.Selection Path (KUK)") }}</p>
                    </div>
                </div>
                <div class="col-12">
                    <div class="about">
                        <p class="about__details">
                            Bantuan KUK memiliki satu jalur yaitu mengikuti Proses Saringan Masuk STMIK Harvest.<br>
                            Potongan diberikan berdasarkan table dibawah ini:
                        </p>
                        <div class="table-responsive mt-3">
                            <table class="table table-striped table-hover table-bordered text-nowrap table-responsive align-middle text-center">
                                <thead>
                                    <tr class="bg-success text-white text-center">
                                        <th>Hasil <br> Saringan Masuk</th>
                                        <th>Besaran Potongan<br> Uang Kuliah</th>
                                        <th>Uang Kuliah<br> Yang Dibayarkan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>A</td>
                                        <td>100%</td>
                                        <td>GRATIS</td>
                                    </tr>
                                    <tr>
                                        <td>B</td>
                                        <td>75%</td>
                                        <td>Rp. 1.1750.000,-</td>
                                    </tr>
                                    <tr>
                                        <td>C</td>
                                        <td>50%</td>
                                        <td>Rp. 3.500.000,-</td>
                                    </tr>
                                    <tr>
                                        <td>D</td>
                                        <td>25%</td>
                                        <td>Rp. 5.250.000,-</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <p class="about__details">
                            Besarnya keringanan berupa pemotongan uang kuliah, selama 2 semester penuh yang termasuk:
                            * BPP Pokok Semester<br>
                            * SKS (Paket)<br>
                            Semester 3 dan seterusnya beasiswa akan berlanjut apabila mahasiswa berhasil memenuhi ketentuan yang telah ditetapkan STMIK Harvest.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="our__about__area bg__white pb--50 pt--30 bg-light">
        <div class="container">
            <div class="row about__wrapper">
                <div class="col-12">
                    <div class="about">
                        <p class="about__details">
                            <strong>NOTE:</strong><br>
                            Apabila calon mahasiswa mendapatkan 100% beasiswa untuk uang pangkal dan uang kuliah, maka calon mahasiswa tersebut diminta memberikan uang tanda jadi bergabung dengan STMIK Harvest sebesar Rp.1.500.000,- sebagai uang komitmen.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
