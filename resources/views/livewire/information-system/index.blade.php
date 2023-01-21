@section("title", trans("index.information_system"))
@section("icon", "fas fa-list")
@section("information-system-active", "active")

<div>
    <section class="our__about__area bg__white pb--80 pt--100">
        <div class="container">
            <div class="row about__wrapper">
                <div class="about">
                    <div class="section__title text-left">
                        <h2 class="title__line">{{ trans("index.introduction") }}</h2>
                        <p>{{ trans("index.undergraduate_for_information_system_programme") }}</p>
                    </div>
                </div>
                <div class="col-12">
                    <div class="about">
                        <p class="about__details">
                            @if (App::isLocale('en'))
                                Information systems become an absolute necessity in an organization. This triggers the need for graduates from the Information Systems major to work in the world of work. STMIK Harvest (formerly STMIK Kuwera) began to specialize in creating graduates who are ready to work in any industry. By continuing to look at technological trends, industry needs and also updating learning methods, STMIK Harvest presents a curriculum that is believed to be competitive and can be applied directly in the world of work to prepare students to be ready to become technopreneurs or entrepreneurs in the field of technology.
                            @else
                                Sistem informasi menjadi kebutuhan mutlak dalam suatu organisasi. Hal ini memicu kebutuhan lulusan dari jurusan Sistem Informasi untuk bekerja di dunia kerja. STMIK Harvest (dahulu STMIK Kuwera) mulai mengkhususkan diri dalam menciptakan lulusan yang siap bekerja di industri apapun. Dengan terus melihat tren teknologi, kebutuhan industri dan juga memperbarui metode pembelajaran, STMIK Harvest menghadirkan kurikulum yang diyakini berdaya saing dan dapat diterapkan langsung di dunia kerja untuk mempersiapkan mahasiswa agar siap menjadi technopreneur atau wirausahawan di dunia kerja. bidang teknologi.
                            @endif
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="htc__service__area bg__white ptb--80 bg-light">
        <div class="container">
            <div class="about">
                <div class="section__title text-center">
                    <h2 class="title__line">{{ trans("index.information_system_specialization") }}</h2>
                    <p>{{ trans("index.undergraduate_for_information_system_programme") }}</p>
                </div>
            </div>

            <div class="row htc__service__wrap mt-5">

                <div class="col-md-6">
                    <div class="service text-center">
                        <div class="service__icon">
                            <i class="fas fa-globe"></i>
                        </div>
                        <div class="service__details">
                            <h2><a draggable="false" href="javascript:;">{{ trans("index.business_information_system") }}</a></h2>
                            <p>
                                @if (App::isLocale('en'))
                                    Focus On Knowledge Of Business Development & Information System Development. Prepared To Become Entrepreneurs In The Field Of Technology. (Technopreneur)
                                @else
                                    Fokus Pada Pengetahuan Pengembangan Bisnis & Pengembangan Sistem Informasi. Disiapkan Untuk Menjadi Pengusaha Di Bidang Teknologi. (Teknopreneur)
                                @endif
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="service text-center service__color--1">
                        <div class="service__icon">
                            <i class="fas fa-line-chart"></i>
                        </div>
                        <div class="service__details">
                            <h2><a draggable="false" href="javascript:;">{{ trans("index.information_system_specialist") }}</a></h2>
                            <p>
                                @if (App::isLocale('en'))
                                    Focus On Developing Mobile And Web Based Information Systems To Become Experts In The Design, Development, Integration And Implementation Of A System.
                                @else
                                    Fokus Pada Pengembangan Sistem Informasi Berbasis Mobile Dan Web Untuk Menjadi Ahli Dalam Desain, Pengembangan, Integrasi Dan Implementasi Sistem.
                                @endif
                            </p>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </section>

    <section class="htc__service__area bg__white ptb--80">
        <div class="container">
            <div class="about">
                <div class="section__title text-center">
                    <h2 class="title__line">{{ trans("index.curicullum") }} {{ trans("index.information_system") }}</h2>
                    <p>{{ env("APP_NAME") }}</p>
                </div>
            </div>
            <div class="table-responsive mt-3">
                <table class="table table-striped table-hover table-bordered text-nowrap table-responsive align-middle">
                    <thead>
                        <tr class="bg-warning text-white text-center">
                            <th colspan="5">
                                {{ trans("index.year") }} 1
                                {{ trans("Learning Outcome") }}:
                                {{ trans("Ready Web Programming") }}.
                                {{ trans("As A Programming Basic") }}
                            </th>
                            <th></th>
                            <th colspan="5">
                                {{ trans("index.year") }} 1
                                {{ trans("Learning Outcome") }}:
                                {{ trans("System Design Capability And More Programming") }}
                            </th>
                        </tr>
                        <tr class="bg-success text-white text-center">
                            <th colspan="2">{{ trans("index.semester") }} 1</th>
                            <th></th>
                            <th colspan="2">{{ trans("index.semester") }} 2</th>
                            <th></th>
                            <th colspan="2">{{ trans("index.semester") }} 3</th>
                            <th></th>
                            <th colspan="2">{{ trans("index.semester") }} 4</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ trans("Discreet Math") }}</td>
                            <td class="text-center">3</td>
                            <td></td>
                            <td>{{ trans("English 1") }}</td>
                            <td class="text-center">2</td>
                            <td></td>
                            <td>{{ trans("Pancasila") }}</td>
                            <td class="text-center">3</td>
                            <td></td>
                            <td>{{ trans("English 2") }}</td>
                            <td class="text-center">2</td>
                        </tr>
                        <tr>
                            <td>{{ trans("Character Building 1 (Religion)") }}</td>
                            <td class="text-center">3</td>
                            <td></td>
                            <td>{{ trans("Character Building 2 (Citizenship)") }}</td>
                            <td class="text-center">2</td>
                            <td></td>
                            <td>{{ trans("Bahasa Indonesia") }}</td>
                            <td class="text-center">3</td>
                            <td></td>
                            <td>{{ trans("Statistics") }}</td>
                            <td class="text-center">3</td>
                        </tr>
                        <tr>
                            <td>{{ trans("Leadership") }}</td>
                            <td class="text-center">2</td>
                            <td></td>
                            <td>{{ trans("Management Information System") }}</td>
                            <td class="text-center">3</td>
                            <td></td>
                            <td>{{ trans("Introduction to Accounting") }}</td>
                            <td class="text-center">3</td>
                            <td></td>
                            <td>{{ trans("Research Methodology") }}</td>
                            <td class="text-center">3</td>
                        </tr>
                        <tr>
                            <td>{{ trans("Algorithm and Programming") }}</td>
                            <td class="text-center">4</td>
                            <td></td>
                            <td>{{ trans("Web Programming 2") }}</td>
                            <td class="text-center">3</td>
                            <td></td>
                            <td>{{ trans("Introduction to Marketing") }}</td>
                            <td class="text-center">2</td>
                            <td></td>
                            <td>{{ trans("System Design and Analysis") }}</td>
                            <td class="text-center">4</td>
                        </tr>
                        <tr>
                            <td>{{ trans("Introduction to Information System") }}</td>
                            <td class="text-center">3</td>
                            <td></td>
                            <td>{{ trans("C Programming") }}</td>
                            <td class="text-center">3</td>
                            <td></td>
                            <td>{{ trans("Database 1") }}</td>
                            <td class="text-center">3</td>
                            <td></td>
                            <td>{{ trans("Operating System") }}</td>
                            <td class="text-center">3</td>
                        </tr>
                        <tr>
                            <td>{{ trans("Web Programming 1") }}</td>
                            <td class="text-center">3</td>
                            <td></td>
                            <td>{{ trans("Data Structure") }}</td>
                            <td class="text-center">3</td>
                            <td></td>
                            <td>{{ trans("Information System Project Management") }}</td>
                            <td class="text-center">3</td>
                            <td></td>
                            <td>{{ trans("Mobile Programming 1") }}</td>
                            <td class="text-center">3</td>
                        </tr>
                        <tr>
                            <td>{{ trans("Introduction to Business") }}</td>
                            <td class="text-center">2</td>
                            <td></td>
                            <td>{{ trans("Introduction to Management") }}</td>
                            <td class="text-center">2</td>
                            <td></td>
                            <td>{{ trans("Object Oriented Programming") }}</td>
                            <td class="text-center">3</td>
                            <td></td>
                            <td>{{ trans("Web Programming 3") }}</td>
                            <td class="text-center">3</td>
                        </tr>
                        <tr>
                            <td>{{ trans("Matrix and Linear Transformation") }}</td>
                            <td class="text-center">2</td>
                            <td></td>
                            <td>{{ trans("Introduction to Computer Networking") }}</td>
                            <td class="text-center">2</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><b>{{ trans("Total") }}</b></td>
                            <td class="text-center">19</td>
                            <td></td>
                            <td><b>{{ trans("Total") }}</b></td>
                            <td class="text-center">20</td>
                            <td></td>
                            <td><b>{{ trans("Total") }}</b></td>
                            <td class="text-center">22</td>
                            <td></td>
                            <td><b>{{ trans("Total") }}</b></td>
                            <td class="text-center">21</td>
                        </tr>
                    </tbody>
                    <thead>
                        <tr class="bg-success text-white text-center">
                            <th colspan="2">{{ trans("index.semester") }} 5</th>
                            <th></th>
                            <th colspan="2">{{ trans("index.semester") }} 6</th>
                            <th></th>
                            <th colspan="2">{{ trans("index.semester") }} 7</th>
                            <th></th>
                            <th colspan="2">{{ trans("index.semester") }} 8</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ trans("Business Ethics") }}</td>
                            <td class="text-center">2</td>
                            <td></td>
                            <td>{{ trans("Enterpreneurship 1") }}</td>
                            <td class="text-center">3</td>
                            <td></td>
                            <td>{{ trans("Community Development") }}</td>
                            <td class="text-center">4</td>
                            <td></td>
                            <td>{{ trans("Final Project") }}</td>
                            <td class="text-center">6</td>
                        </tr>
                        <tr>
                            <td>{{ trans("Database 2") }}</td>
                            <td class="text-center">3</td>
                            <td></td>
                            <td>{{ trans("Project 2") }}</td>
                            <td class="text-center">3</td>
                            <td></td>
                            <td>{{ trans("Intership") }}</td>
                            <td class="text-center">4</td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>{{ trans("Distributed System & Cloud Computing") }}</td>
                            <td class="text-center">3</td>
                            <td></td>
                            <td>{{ trans("Computer Security & Risk Management") }}</td>
                            <td class="text-center">3</td>
                            <td></td>
                            <td>{{ trans("Information System Security") }}</td>
                            <td class="text-center">3</td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>{{ trans("Project 1") }}</td>
                            <td class="text-center">3</td>
                            <td></td>
                            <td>{{ trans("Finance for non Finance") }}</td>
                            <td class="text-center">3</td>
                            <td></td>
                            <td>{{ trans("Human Computer Interaction") }}</td>
                            <td class="text-center">2</td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>{{ trans("Enterpreneurship 2") }}</td>
                            <td class="text-center">2</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>

                    <thead>
                        <tr class="bg-warning text-white text-center">
                            <th colspan="100%">{{ trans("BUSINESS INFORMATION SYSTEM (BIS)") }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ trans("E-Business") }}</td>
                            <td class="text-center">3</td>
                            <td></td>
                            <td>{{ trans("IT Strategic Planning") }}</td>
                            <td class="text-center">3</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>{{ trans("Business Communication") }}</td>
                            <td class="text-center">2</td>
                            <td></td>
                            <td>{{ trans("Elective") }}</td>
                            <td class="text-center">3</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>{{ trans("Asset Management & IT Audit") }}</td>
                            <td class="text-center">3</td>
                            <td></td>
                            <td>{{ trans("Elective") }}</td>
                            <td class="text-center">3</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><b>{{ trans("Total") }}</b></td>
                            <td class="text-center">20</td>
                            <td></td>
                            <td><b>{{ trans("Total") }}</b></td>
                            <td class="text-center">21</td>
                            <td></td>
                            <td><b>{{ trans("Total") }}</b></td>
                            <td class="text-center">15</td>
                            <td></td>
                            <td><b>{{ trans("Total") }}</b></td>
                            <td class="text-center">6</td>
                        </tr>
                    </tbody>

                    <thead>
                        <tr class="bg-warning text-white text-center">
                            <th colspan="100%">{{ trans("INFORMATION SYSTEM SPECIALIST (ISS)") }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ trans("Mobile Programming 2") }}</td>
                            <td class="text-center">3</td>
                            <td></td>
                            <td>{{ trans("Enterprise Architecture") }}</td>
                            <td class="text-center">3</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>{{ trans("Software Testing") }}</td>
                            <td class="text-center">2</td>
                            <td></td>
                            <td>{{ trans("Elective") }}</td>
                            <td class="text-center">3</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>{{ trans("Software Engineering") }}</td>
                            <td class="text-center">3</td>
                            <td></td>
                            <td>{{ trans("Elective") }}</td>
                            <td class="text-center">3</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><b>{{ trans("Total") }}</b></td>
                            <td class="text-center">20</td>
                            <td></td>
                            <td><b>{{ trans("Total") }}</b></td>
                            <td class="text-center">21</td>
                            <td></td>
                            <td><b>{{ trans("Total") }}</b></td>
                            <td class="text-center">15</td>
                            <td></td>
                            <td><b>{{ trans("Total") }}</b></td>
                            <td class="text-center">6</td>
                        </tr>
                    </tbody>

                    <thead>
                        <tr class="bg-warning text-white text-center">
                            <th colspan="5">
                                {{ trans("index.year") }} 3
                                {{ trans("Learning Outcome") }}:
                                {{ trans("Ready For Small Projects & More Specific To Concentration") }}
                            </th>
                            <th></th>
                            <th colspan="5">
                                {{ trans("index.year") }} 4
                                {{ trans("Learning Outcome") }}:
                                {{ trans("Ready To Be In Society & Be A Technopreneur") }}
                            </th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </section>

    <section class="htc__service__area bg__white ptb--80 bg-light">
        <div class="container">
            <div class="mt-3">
                <table class="table table-striped table-hover table-bordered align-middle">
                    <thead>
                        <tr class="bg-success text-white text-center">
                            <th colspan="100%">{{ trans("index.graduate_profile") }}</th>
                        </tr>
                        <tr class="bg-success text-white text-center">
                            <th>{{ trans("ISS") }}</th>
                            <th>{{ trans("BIS") }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ trans("System Analyst") }}</td>
                            <td>{{ trans("Business Analyst") }}</td>
                        </tr>
                        <tr>
                            <td>{{ trans("Programmer") }}</td>
                            <td>{{ trans("Management Information System (MIS)") }}</td>
                        </tr>
                        <tr>
                            <td>{{ trans("Entrepreneur") }}</td>
                            <td>{{ trans("Programmer (Web)") }}</td>
                        </tr>
                        <tr>
                            <td>{{ trans("System Developer") }}</td>
                            <td>{{ trans("Entrepreneur") }}</td>
                        </tr>
                        <tr>
                            <td>{{ trans("IT Consultant") }}</td>
                            <td>{{ trans("IT Auditor") }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <section class="htc__service__area bg__white ptb--80">
        <div class="container">
            <div class="mt-3">
                <table class="table table-striped table-hover table-bordered text-nowrap align-middle">
                    <thead>
                        <tr class="bg-success text-white text-center">
                            <th colspan="100%">{{ trans("index.elective") }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ trans("Business Intelligence") }}</td>
                            <td class="text-center">3</td>
                        </tr>
                        <tr>
                            <td>{{ trans("Introduction to ERP") }}</td>
                            <td class="text-center">3</td>
                        </tr>
                        <tr>
                            <td>{{ trans("C# Visual Programming") }}</td>
                            <td class="text-center">3</td>
                        </tr>
                        <tr>
                            <td>{{ trans("Enterprise Architecture 2") }}</td>
                            <td class="text-center">3</td>
                        </tr>
                        <tr>
                            <td>{{ trans("Knowledge Management") }}</td>
                            <td class="text-center">3</td>
                        </tr>
                        <tr>
                            <td>{{ trans("Visual Communication Design") }}</td>
                            <td class="text-center">3</td>
                        </tr>
                        <tr>
                            <td>{{ trans("Customer Relationship Management") }}</td>
                            <td class="text-center">3</td>
                        </tr>
                        <tr>
                            <td>{{ trans("Supply Chain Management") }}</td>
                            <td class="text-center">3</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>
