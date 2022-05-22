@section("name", trans("page.{$menu_name}"))
@section("icon", $menu_icon)

@section("{$menu_slug}-active", "active")

<div>
    <section class="our__about__area bg__white pb--80 pt--100">
        <div class="container">
            <div class="row about__wrapper">
                <div class="about">
                    <div class="section__title text-left">
                        <h2 class="title__line">{{ trans("general.Introduction") }}</h2>
                        <p>{{ trans("general.Undergraduate For Information System Programme") }}</p>
                    </div>
                </div>
                <div class="col-12">
                    <div class="about">
                        <p class="about__details">{{ trans("general.Information systems become an absolute necessity in an organization. This triggers the need for graduates from the Information Systems major to work in the world of work. STMIK Harvest (formerly STMIK Kuwera) began to specialize in creating graduates who are ready to work in any industry. By continuing to look at technological trends, industry needs and also updating learning methods, STMIK Harvest presents a curriculum that is believed to be competitive and can be applied directly in the world of work to prepare students to be ready to become technopreneurs or entrepreneurs in the field of technology.") }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="htc__service__area bg__white ptb--80 bg-light">
        <div class="container">
            <div class="about">
                <div class="section__title text-center">
                    <h2 class="title__line">{{ trans("general.Information System Specialization") }}</h2>
                    <p>{{ trans("general.Undergraduate For Information System Programme") }}</p>
                </div>
            </div>

            <div class="row htc__service__wrap mt-5">

                <div class="col-md-6">
                    <div class="service text-center">
                        <div class="service__icon">
                            <i class="fas fa-globe"></i>
                        </div>
                        <div class="service__details">
                            <h2><a draggable="false" href="javascript:;">{{ trans("general.Business Information System") }}</a></h2>
                            <p>{{ trans("general.Focus on knowledge of business development & information system development. prepared to become entrepreneurs in the field of technology. (technopreneur)") }}</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="service text-center service__color--1">
                        <div class="service__icon">
                            <i class="fas fa-line-chart"></i>
                        </div>
                        <div class="service__details">
                            <h2><a draggable="false" href="javascript:;">{{ trans("general.Information System Specialist") }}</a></h2>
                            <p>{{ trans("general.Focus on developing mobile and web-based Information Systems to become experts in the design, development, integration and implementation of a system.") }}</p>
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
                    <h2 class="title__line">{{ trans("general.STMIK Harvest Curicullum") }}</h2>
                    <p>{{ trans("general.Information System") }}</p>
                </div>
            </div>
            <div class="table-responsive mt-3">
                <table class="table table-striped table-hover table-bordered text-nowrap table-responsive align-middle text-center">
                    <thead>
                        <tr class="bg-warning text-white text-center">
                            <th colspan="5">
                                {{ trans("general.Year") }} 1
                                {{ trans("general.Learning Outcome") }}:
                                {{ trans("general.Ready Web Programming") }}.
                                {{ trans("general.As A Programming Basic") }}
                            </th>
                            <th></th>
                            <th colspan="5">
                                {{ trans("general.Year") }} 1
                                {{ trans("general.Learning Outcome") }}:
                                {{ trans("general.System Design Capability And More Programming") }}
                            </th>
                        </tr>
                        <tr class="bg-success text-white text-center">
                            <th colspan="2">{{ trans("general.Semester") }} 1</th>
                            <th></th>
                            <th colspan="2">{{ trans("general.Semester") }} 2</th>
                            <th></th>
                            <th colspan="2">{{ trans("general.Semester") }} 3</th>
                            <th></th>
                            <th colspan="2">{{ trans("general.Semester") }} 4</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ trans("general.Discreet Math") }}</td>
                            <td>3</td>
                            <td></td>
                            <td>{{ trans("general.English 1") }}</td>
                            <td>2</td>
                            <td></td>
                            <td>{{ trans("general.Pancasila") }}</td>
                            <td>3</td>
                            <td></td>
                            <td>{{ trans("general.English 2") }}</td>
                            <td>2</td>
                        </tr>
                        <tr>
                            <td>{{ trans("general.Character Building 1 (Religion)") }}</td>
                            <td>3</td>
                            <td></td>
                            <td>{{ trans("general.English 1") }}</td>
                            <td>2</td>
                            <td></td>
                            <td>{{ trans("general.Pancasila") }}</td>
                            <td>3</td>
                            <td></td>
                            <td>{{ trans("general.English 2") }}</td>
                            <td>2</td>
                        </tr>
                    </tbody>
                    <thead>
                        <tr class="bg-success text-white text-center">
                            <th colspan="2">{{ trans("general.Semester") }} 5</th>
                            <th></th>
                            <th colspan="2">{{ trans("general.Semester") }} 6</th>
                            <th></th>
                            <th colspan="2">{{ trans("general.Semester") }} 7</th>
                            <th></th>
                            <th colspan="2">{{ trans("general.Semester") }} 8</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ trans("general.Discreet Math") }}</td>
                            <td>3</td>
                            <td></td>
                            <td>{{ trans("general.English 1") }}</td>
                            <td>2</td>
                            <td></td>
                            <td>{{ trans("general.Pancasila") }}</td>
                            <td>3</td>
                            <td></td>
                            <td>{{ trans("general.English 2") }}</td>
                            <td>2</td>
                        </tr>
                    </tbody>
                    <thead>
                        <tr class="bg-warning text-white text-center">
                            <th colspan="5">
                                {{ trans("general.Year") }} 3
                                {{ trans("general.Learning Outcome") }}:
                                {{ trans("general.Ready For Small Projects & More Specific To Concentration") }}
                            </th>
                            <th></th>
                            <th colspan="5">
                                {{ trans("general.Year") }} 4
                                {{ trans("general.Learning Outcome") }}:
                                {{ trans("general.Ready To Be In Society & Be A Technopreneur") }}
                            </th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </section>

    <section class="htc__service__area bg__white ptb--80 bg-light">
        <div class="container">
            <div class="table-responsive mt-3">
                <table class="table table-striped table-hover table-bordered text-nowrap table-responsive align-middle text-center">
                    <thead>
                        <tr class="bg-success text-white text-center">
                            <th colspan="100%">{{ trans("general.Graduate Profile") }}</th>
                        </tr>
                        <tr class="bg-success text-white text-center">
                            <th>{{ trans("general.ISS") }}</th>
                            <th>{{ trans("general.BIS") }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ trans("general.System Analyst") }}</td>
                            <td>{{ trans("general.Business Analyst") }}</td>
                        </tr>
                        <tr>
                            <td>{{ trans("general.Programmer") }}</td>
                            <td>{{ trans("general.Management Information System (MIS)") }}</td>
                        </tr>
                        <tr>
                            <td>{{ trans("general.Entrepreneur") }}</td>
                            <td>{{ trans("general.Programmer (Web)") }}</td>
                        </tr>
                        <tr>
                            <td>{{ trans("general.System Developer") }}</td>
                            <td>{{ trans("general.Entrepreneur") }}</td>
                        </tr>
                        <tr>
                            <td>{{ trans("general.IT Consultant") }}</td>
                            <td>{{ trans("general.IT Auditor") }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <section class="htc__service__area bg__white ptb--80">
        <div class="container">
            <div class="table-responsive mt-3">
                <table class="table table-striped table-hover table-bordered text-nowrap table-responsive align-middle text-center">
                    <thead>
                        <tr class="bg-success text-white text-center">
                            <th colspan="100%">{{ trans("general.Elective") }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ trans("general.Business Intelligence") }}</td>
                            <td>3</td>
                        </tr>
                        <tr>
                            <td>{{ trans("general.Introduction to ERP") }}</td>
                            <td>3</td>
                        </tr>
                        <tr>
                            <td>{{ trans("general.C# Visual Programming") }}</td>
                            <td>3</td>
                        </tr>
                        <tr>
                            <td>{{ trans("general.Enterprise Architecture 2") }}</td>
                            <td>3</td>
                        </tr>
                        <tr>
                            <td>{{ trans("general.Knowledge Management") }}</td>
                            <td>3</td>
                        </tr>
                        <tr>
                            <td>{{ trans("general.Visual Communication Design") }}</td>
                            <td>3</td>
                        </tr>
                        <tr>
                            <td>{{ trans("general.Customer Relationship Management") }}</td>
                            <td>3</td>
                        </tr>
                        <tr>
                            <td>{{ trans("general.Supply Chain Management") }}</td>
                            <td>3</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>
