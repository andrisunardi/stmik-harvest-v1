@section("name", trans("page.{$menu_name}"))
@section("icon", $menu_icon)

@section("{$menu_slug}-active", "active")

<div>
    <section class="our__about__area bg__white pb--80 pt--100">
        <div class="container">
            <div class="row about__wrapper">
                <div class="about">
                    <div class="section__title text-left">
                        <h2 class="title__line">{{ trans("index.Introduction") }}</h2>
                        <p>{{ trans("index.Undergraduate For Information System Programme") }}</p>
                    </div>
                </div>
                <div class="col-12">
                    <div class="about">
                        <p class="about__details">{{ trans("index.Information systems become an absolute necessity in an organization. This triggers the need for graduates from the Information Systems major to work in the world of work. STMIK Harvest (formerly STMIK Kuwera) began to specialize in creating graduates who are ready to work in any industry. By continuing to look at technological trends, industry needs and also updating learning methods, STMIK Harvest presents a curriculum that is believed to be competitive and can be applied directly in the world of work to prepare students to be ready to become technopreneurs or entrepreneurs in the field of technology.") }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="htc__service__area bg__white ptb--80 bg-light">
        <div class="container">
            <div class="about">
                <div class="section__title text-center">
                    <h2 class="title__line">{{ trans("index.Information System Specialization") }}</h2>
                    <p>{{ trans("index.Undergraduate For Information System Programme") }}</p>
                </div>
            </div>

            <div class="row htc__service__wrap mt-5">

                <div class="col-md-6">
                    <div class="service text-center">
                        <div class="service__icon">
                            <i class="fas fa-globe"></i>
                        </div>
                        <div class="service__details">
                            <h2><a draggable="false" href="javascript:;">{{ trans("index.Business Information System") }}</a></h2>
                            <p>{{ trans("index.Focus on knowledge of business development & information system development. prepared to become entrepreneurs in the field of technology. (technopreneur)") }}</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="service text-center service__color--1">
                        <div class="service__icon">
                            <i class="fas fa-line-chart"></i>
                        </div>
                        <div class="service__details">
                            <h2><a draggable="false" href="javascript:;">{{ trans("index.Information System Specialist") }}</a></h2>
                            <p>{{ trans("index.Focus on developing mobile and web-based Information Systems to become experts in the design, development, integration and implementation of a system.") }}</p>
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
                    <h2 class="title__line">{{ trans("STMIK Harvest Curicullum") }}</h2>
                    <p>{{ trans("Information System") }}</p>
                </div>
            </div>
            <div class="table-responsive mt-3">
                <table class="table table-striped table-hover table-bordered text-nowrap table-responsive align-middle">
                    <thead>
                        <tr class="bg-warning text-white text-center">
                            <th colspan="5">
                                {{ trans("Year") }} 1
                                {{ trans("Learning Outcome") }}:
                                {{ trans("Ready Web Programming") }}.
                                {{ trans("As A Programming Basic") }}
                            </th>
                            <th></th>
                            <th colspan="5">
                                {{ trans("Year") }} 1
                                {{ trans("Learning Outcome") }}:
                                {{ trans("System Design Capability And More Programming") }}
                            </th>
                        </tr>
                        <tr class="bg-success text-white text-center">
                            <th colspan="2">{{ trans("Semester") }} 1</th>
                            <th></th>
                            <th colspan="2">{{ trans("Semester") }} 2</th>
                            <th></th>
                            <th colspan="2">{{ trans("Semester") }} 3</th>
                            <th></th>
                            <th colspan="2">{{ trans("Semester") }} 4</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ trans("Discreet Math") }}</td>
                            <td>3</td>
                            <td></td>
                            <td>{{ trans("English 1") }}</td>
                            <td>2</td>
                            <td></td>
                            <td>{{ trans("Pancasila") }}</td>
                            <td>3</td>
                            <td></td>
                            <td>{{ trans("English 2") }}</td>
                            <td>2</td>
                        </tr>
                        <tr>
                            <td>{{ trans("Character Building 1 (Religion)") }}</td>
                            <td>3</td>
                            <td></td>
                            <td>{{ trans("Character Building 2 (Citizenship)") }}</td>
                            <td>2</td>
                            <td></td>
                            <td>{{ trans("Bahasa Indonesia") }}</td>
                            <td>3</td>
                            <td></td>
                            <td>{{ trans("Statistics") }}</td>
                            <td>3</td>
                        </tr>
                        <tr>
                            <td>{{ trans("Leadership") }}</td>
                            <td>2</td>
                            <td></td>
                            <td>{{ trans("Management Information System") }}</td>
                            <td>3</td>
                            <td></td>
                            <td>{{ trans("Introduction to Accounting") }}</td>
                            <td>3</td>
                            <td></td>
                            <td>{{ trans("Research Methodology") }}</td>
                            <td>3</td>
                        </tr>
                        <tr>
                            <td>{{ trans("Algorithm and Programming") }}</td>
                            <td>4</td>
                            <td></td>
                            <td>{{ trans("Web Programming 2") }}</td>
                            <td>3</td>
                            <td></td>
                            <td>{{ trans("Introduction to Marketing") }}</td>
                            <td>2</td>
                            <td></td>
                            <td>{{ trans("System Design and Analysis") }}</td>
                            <td>4</td>
                        </tr>
                        <tr>
                            <td>{{ trans("Introduction to Information Syste,") }}</td>
                            <td>3</td>
                            <td></td>
                            <td>{{ trans("C Programming") }}</td>
                            <td>3</td>
                            <td></td>
                            <td>{{ trans("Database 1") }}</td>
                            <td>3</td>
                            <td></td>
                            <td>{{ trans("Operating System") }}</td>
                            <td>3</td>
                        </tr>
                        <tr>
                            <td>{{ trans("Web Programming 1") }}</td>
                            <td>3</td>
                            <td></td>
                            <td>{{ trans("Data Structure") }}</td>
                            <td>3</td>
                            <td></td>
                            <td>{{ trans("Information System Project Management") }}</td>
                            <td>3</td>
                            <td></td>
                            <td>{{ trans("Mobile Programming 1") }}</td>
                            <td>3</td>
                        </tr>
                        <tr>
                            <td>{{ trans("Introduction to Business") }}</td>
                            <td>2</td>
                            <td></td>
                            <td>{{ trans("Introduction to Management") }}</td>
                            <td>2</td>
                            <td></td>
                            <td>{{ trans("Object Oriented Programming") }}</td>
                            <td>3</td>
                            <td></td>
                            <td>{{ trans("Web Programming 3") }}</td>
                            <td>3</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>{{ trans("Matrix and Linear Transformation") }}</td>
                            <td>2</td>
                            <td></td>
                            <td>{{ trans("Introduction to Computer Networking") }}</td>
                            <td>2</td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><b>{{ trans("Total") }}</b></td>
                            <td>19</td>
                            <td></td>
                            <td><b>{{ trans("Total") }}</b></td>
                            <td>20</td>
                            <td></td>
                            <td><b>{{ trans("Total") }}</b></td>
                            <td>22</td>
                            <td></td>
                            <td><b>{{ trans("Total") }}</b></td>
                            <td>21</td>
                        </tr>
                    </tbody>
                    <thead>
                        <tr class="bg-success text-white text-center">
                            <th colspan="2">{{ trans("Semester") }} 5</th>
                            <th></th>
                            <th colspan="2">{{ trans("Semester") }} 6</th>
                            <th></th>
                            <th colspan="2">{{ trans("Semester") }} 7</th>
                            <th></th>
                            <th colspan="2">{{ trans("Semester") }} 8</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ trans("Business Ethics") }}</td>
                            <td>2</td>
                            <td></td>
                            <td>{{ trans("Enterpreneurship 1") }}</td>
                            <td>3</td>
                            <td></td>
                            <td>{{ trans("Community Development") }}</td>
                            <td>4</td>
                            <td></td>
                            <td>{{ trans("Final Project") }}</td>
                            <td>6</td>
                        </tr>
                        <tr>
                            <td>{{ trans("Database 2") }}</td>
                            <td>3</td>
                            <td></td>
                            <td>{{ trans("Project 2") }}</td>
                            <td>3</td>
                            <td></td>
                            <td>{{ trans("Intership") }}</td>
                            <td>4</td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>{{ trans("Distributed System & Cloud Computing") }}</td>
                            <td>3</td>
                            <td></td>
                            <td>{{ trans("Computer Security & Risk Management") }}</td>
                            <td>3</td>
                            <td></td>
                            <td>{{ trans("Information System Security") }}</td>
                            <td>3</td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>{{ trans("Project 1") }}</td>
                            <td>3</td>
                            <td></td>
                            <td>{{ trans("Finance for non Finance") }}</td>
                            <td>3</td>
                            <td></td>
                            <td>{{ trans("Human Computer Interaction") }}</td>
                            <td>2</td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>{{ trans("Enterpreneurship 2") }}</td>
                            <td>2</td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>

                    <thead>
                        <tr class="bg-warning text-white text-center">
                            <th colspan="100%">{{ trans("custom.BUSINESS INFORMATION SYSTEM (BIS)") }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ trans("E-Business") }}</td>
                            <td>3</td>
                            <td></td>
                            <td>{{ trans("IT Strategic Planning") }}</td>
                            <td>3</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>{{ trans("Business Communication") }}</td>
                            <td>2</td>
                            <td></td>
                            <td>{{ trans("Elective") }}</td>
                            <td>3</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>{{ trans("Asset Management & IT Audit") }}</td>
                            <td>3</td>
                            <td></td>
                            <td>{{ trans("Elective") }}</td>
                            <td>3</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><b>{{ trans("Total") }}</b></td>
                            <td>20</td>
                            <td></td>
                            <td><b>{{ trans("Total") }}</b></td>
                            <td>21</td>
                            <td></td>
                            <td><b>{{ trans("Total") }}</b></td>
                            <td>15</td>
                            <td></td>
                            <td><b>{{ trans("Total") }}</b></td>
                            <td>6</td>
                        </tr>
                    </tbody>

                    <thead>
                        <tr class="bg-warning text-white text-center">
                            <th colspan="100%">{{ trans("custom.INFORMATION SYSTEM SPECIALIST (ISS)") }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ trans("Mobile Programming 2") }}</td>
                            <td>3</td>
                            <td></td>
                            <td>{{ trans("Enterprise Architecture") }}</td>
                            <td>3</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>{{ trans("Software Testing") }}</td>
                            <td>2</td>
                            <td></td>
                            <td>{{ trans("Elective") }}</td>
                            <td>3</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>{{ trans("Software Engineering") }}</td>
                            <td>3</td>
                            <td></td>
                            <td>{{ trans("Elective") }}</td>
                            <td>3</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><b>{{ trans("Total") }}</b></td>
                            <td>20</td>
                            <td></td>
                            <td><b>{{ trans("Total") }}</b></td>
                            <td>21</td>
                            <td></td>
                            <td><b>{{ trans("Total") }}</b></td>
                            <td>15</td>
                            <td></td>
                            <td><b>{{ trans("Total") }}</b></td>
                            <td>6</td>
                        </tr>
                    </tbody>

                    <thead>
                        <tr class="bg-warning text-white text-center">
                            <th colspan="5">
                                {{ trans("Year") }} 3
                                {{ trans("Learning Outcome") }}:
                                {{ trans("Ready For Small Projects & More Specific To Concentration") }}
                            </th>
                            <th></th>
                            <th colspan="5">
                                {{ trans("Year") }} 4
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
                            <th colspan="100%">{{ trans("index.Graduate Profile") }}</th>
                        </tr>
                        <tr class="bg-success text-white text-center">
                            <th>{{ trans("index.ISS") }}</th>
                            <th>{{ trans("index.BIS") }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ trans("index.System Analyst") }}</td>
                            <td>{{ trans("index.Business Analyst") }}</td>
                        </tr>
                        <tr>
                            <td>{{ trans("index.Programmer") }}</td>
                            <td>{{ trans("index.Management Information System (MIS)") }}</td>
                        </tr>
                        <tr>
                            <td>{{ trans("index.Entrepreneur") }}</td>
                            <td>{{ trans("index.Programmer (Web)") }}</td>
                        </tr>
                        <tr>
                            <td>{{ trans("index.System Developer") }}</td>
                            <td>{{ trans("index.Entrepreneur") }}</td>
                        </tr>
                        <tr>
                            <td>{{ trans("index.IT Consultant") }}</td>
                            <td>{{ trans("index.IT Auditor") }}</td>
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
                            <th colspan="100%">{{ trans("index.Elective") }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ trans("index.Business Intelligence") }}</td>
                            <td class="text-center">3</td>
                        </tr>
                        <tr>
                            <td>{{ trans("index.Introduction to ERP") }}</td>
                            <td class="text-center">3</td>
                        </tr>
                        <tr>
                            <td>{{ trans("index.C# Visual Programming") }}</td>
                            <td class="text-center">3</td>
                        </tr>
                        <tr>
                            <td>{{ trans("index.Enterprise Architecture 2") }}</td>
                            <td class="text-center">3</td>
                        </tr>
                        <tr>
                            <td>{{ trans("index.Knowledge Management") }}</td>
                            <td class="text-center">3</td>
                        </tr>
                        <tr>
                            <td>{{ trans("index.Visual Communication Design") }}</td>
                            <td class="text-center">3</td>
                        </tr>
                        <tr>
                            <td>{{ trans("index.Customer Relationship Management") }}</td>
                            <td class="text-center">3</td>
                        </tr>
                        <tr>
                            <td>{{ trans("index.Supply Chain Management") }}</td>
                            <td class="text-center">3</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>
