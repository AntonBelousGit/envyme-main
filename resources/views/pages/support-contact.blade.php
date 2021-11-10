@extends('layout.app')
<!-- END Header-->
<!-- SupportContact-->
@section('content')
    <section class="support-contact">
        <div class="support-contact__banner">
            <div class="breadcrumbs">
                <span><a href="/"></a></span><span>/</span><span>{{ __('page.support_and_contact')}}</span><span> </span><span></span>
            </div>

						<div class="wrap_cart">
		<img src="/img/karte.svg" alt="" style="opacity: 1;">
		<div class="svg_cart wrap_svg_icela">
			<div class="name_country">
				iceland
				<div class="wrap_prompt_cart">
					<div class="prompt_cart">
						<span class="pc_name">
							iceland
						</span>
						<span class="pc_partners">
                            @if($count_club_per_country['Iceland'] != 0)
							{{$count_club_per_country['Iceland']}} Clubs,
                            @endif
                            @if($count_event_activity_per_country['Iceland'] != 0)
                                {{$count_event_activity_per_country['Iceland']}} Activities,
                            @endif
                            @if($count_event_package_per_country['Iceland'] != 0)
                                {{$count_event_package_per_country['Iceland']}} Packages
                            @endif
						</span>
					</div>
				</div>
			</div>
			<div class="map_svg svg_icela"></div>
		</div>
		<div class="svg_cart wrap_svg_ireland">
			<div class="name_country">
				ireland
				<div class="wrap_prompt_cart">
					<div class="prompt_cart">
						<span class="pc_name">
							ireland
						</span>
						<span class="pc_partners">
							@if($count_club_per_country['Ireland'] != 0)
                                {{$count_club_per_country['Ireland']}} Clubs,
                            @endif
                            @if($count_event_activity_per_country['Ireland'] != 0)
                                {{$count_event_activity_per_country['Ireland']}} Activities,
                            @endif
                            @if($count_event_package_per_country['Ireland'] != 0)
                                {{$count_event_package_per_country['Ireland']}} Packages
                            @endif
						</span>
					</div>
				</div>
			</div>
			<div class="map_svg svg_ireland"></div>
		</div>
		<div class="svg_cart wrap_svg_unkin">
			<div class="name_country">
				united <br> kingdom
				<div class="wrap_prompt_cart">
					<div class="prompt_cart">
						<span class="pc_name">
							united kingdom
						</span>
						<span class="pc_partners">
							@if($count_club_per_country['United Kingdom'] != 0)
                                {{$count_club_per_country['United Kingdom']}} Clubs,
                            @endif
                            @if($count_event_activity_per_country['United Kingdom'] != 0)
                                {{$count_event_activity_per_country['United Kingdom']}} Activities,
                            @endif
                            @if($count_event_package_per_country['United Kingdom'] != 0)
                                {{$count_event_package_per_country['United Kingdom']}} Packages
                            @endif
						</span>
					</div>
				</div>
			</div>
			<div class="map_svg svg_unkin"></div>
		</div>
		<div class="svg_cart wrap_svg_Albania">
			<div class="name_country">
				Albania
				<div class="wrap_prompt_cart">
					<div class="prompt_cart">
						<span class="pc_name">
							Albania
						</span>
						<span class="pc_partners">
							@if($count_club_per_country['Albania'] != 0)
                                {{$count_club_per_country['Albania']}} Clubs,
                            @endif
                            @if($count_event_activity_per_country['Albania'] != 0)
                                {{$count_event_activity_per_country['Albania']}} Activities,
                            @endif
                            @if($count_event_package_per_country['Albania'] != 0)
                                {{$count_event_package_per_country['Albania']}} Packages
                            @endif
						</span>
					</div>
				</div>
			</div>
			<div class="map_svg svg_Albania"></div>
		</div>
		<div class="svg_cart wrap_svg_Armenia">
			<div class="name_country">
				Armenia
				<div class="wrap_prompt_cart">
					<div class="prompt_cart">
						<span class="pc_name">
							Armenia
						</span>
						<span class="pc_partners">
							@if($count_club_per_country['Armenia'] != 0)
                                {{$count_club_per_country['Armenia']}} Clubs,
                            @endif
                            @if($count_event_activity_per_country['Armenia'] != 0)
                                {{$count_event_activity_per_country['Armenia']}} Activities,
                            @endif
                            @if($count_event_package_per_country['Armenia'] != 0)
                                {{$count_event_package_per_country['Armenia']}} Packages
                            @endif
						</span>
					</div>
				</div>
			</div>
			<div class="map_svg svg_Armenia"></div>
		</div>
		<div class="svg_cart wrap_svg_Austria">
			<div class="name_country">
				Austria
				<div class="wrap_prompt_cart">
					<div class="prompt_cart">
						<span class="pc_name">
							Austria
						</span>
						<span class="pc_partners">
							@if($count_club_per_country['Austria'] != 0)
                                {{$count_club_per_country['Austria']}} Clubs,
                            @endif
                            @if($count_event_activity_per_country['Austria'] != 0)
                                {{$count_event_activity_per_country['Austria']}} Activities,
                            @endif
                            @if($count_event_package_per_country['Austria'] != 0)
                                {{$count_event_package_per_country['Austria']}} Packages
                            @endif
						</span>
					</div>
				</div>
			</div>
			<div class="map_svg svg_Austria"></div>
		</div>

		<div class="svg_cart wrap_svg_Azerbaijan">
			<div class="name_country">
				Azerbaijan
				<div class="wrap_prompt_cart">
					<div class="prompt_cart">
						<span class="pc_name">
							Azerbaijan
						</span>
						<span class="pc_partners">
							@if($count_club_per_country['Azerbaijan'] != 0)
                                {{$count_club_per_country['Azerbaijan']}} Clubs,
                            @endif
                            @if($count_event_activity_per_country['Azerbaijan'] != 0)
                                {{$count_event_activity_per_country['Azerbaijan']}} Activities,
                            @endif
                            @if($count_event_package_per_country['Azerbaijan'] != 0)
                                {{$count_event_package_per_country['Azerbaijan']}} Packages
                            @endif
						</span>
					</div>
				</div>
			</div>
			<div class="map_svg svg_Azerbaijan"></div>
		</div>

		<div class="svg_cart wrap_svg_Belarus">
			<div class="name_country">
				Belarus
				<div class="wrap_prompt_cart">
					<div class="prompt_cart">
						<span class="pc_name">
							Belarus
						</span>
						<span class="pc_partners">
							@if($count_club_per_country['Belarus'] != 0)
                                {{$count_club_per_country['Belarus']}} Clubs,
                            @endif
                            @if($count_event_activity_per_country['Belarus'] != 0)
                                {{$count_event_activity_per_country['Belarus']}} Activities,
                            @endif
                            @if($count_event_package_per_country['Belarus'] != 0)
                                {{$count_event_package_per_country['Belarus']}} Packages
                            @endif
						</span>
					</div>
				</div>
			</div>
			<div class="map_svg svg_Belarus"></div>
		</div>

		<div class="svg_cart wrap_svg_Belgium">
			<div class="name_country">
				Belgium
				<div class="wrap_prompt_cart">
					<div class="prompt_cart">
						<span class="pc_name">
							Belgium
						</span>
						<span class="pc_partners">
							@if($count_club_per_country['Belgium'] != 0)
                                {{$count_club_per_country['Belgium']}} Clubs,
                            @endif
                            @if($count_event_activity_per_country['Belgium'] != 0)
                                {{$count_event_activity_per_country['Belgium']}} Activities,
                            @endif
                            @if($count_event_package_per_country['Belgium'] != 0)
                                {{$count_event_package_per_country['Belgium']}} Packages
                            @endif
						</span>
					</div>
				</div>
			</div>
			<div class="map_svg svg_Belgium"></div>
		</div>

		<div class="svg_cart wrap_svg_Herzegovina">
			<div class="name_country">
				Bosnia and <br> Herzegovina
				<div class="wrap_prompt_cart">
					<div class="prompt_cart">
						<span class="pc_name">
							Bosnia and <br> Herzegovina
						</span>
						<span class="pc_partners">
							@if($count_club_per_country['Herzegovina'] != 0)
                                {{$count_club_per_country['Herzegovina']}} Clubs,
                            @endif
                            @if($count_event_activity_per_country['Herzegovina'] != 0)
                                {{$count_event_activity_per_country['Herzegovina']}} Activities,
                            @endif
                            @if($count_event_package_per_country['Herzegovina'] != 0)
                                {{$count_event_package_per_country['Herzegovina']}} Packages
                            @endif
						</span>
					</div>
				</div>
			</div>
			<div class="map_svg svg_Herzegovina"></div>
		</div>

		<div class="svg_cart wrap_svg_Bulgaria">
			<div class="name_country">
				Bulgaria
				<div class="wrap_prompt_cart">
					<div class="prompt_cart">
						<span class="pc_name">
							Bulgaria
						</span>
						<span class="pc_partners">
							@if($count_club_per_country['Bulgaria'] != 0)
                                {{$count_club_per_country['Bulgaria']}} Clubs,
                            @endif
                            @if($count_event_activity_per_country['Bulgaria'] != 0)
                                {{$count_event_activity_per_country['Bulgaria']}} Activities,
                            @endif
                            @if($count_event_package_per_country['Bulgaria'] != 0)
                                {{$count_event_package_per_country['Bulgaria']}} Packages
                            @endif
						</span>
					</div>
				</div>
			</div>
			<div class="map_svg svg_Bulgaria"></div>
		</div>

		<div class="svg_cart wrap_svg_Croatia">
			<div class="name_country">
				Croatia
				<div class="wrap_prompt_cart">
					<div class="prompt_cart">
						<span class="pc_name">
							Croatia
						</span>
						<span class="pc_partners">
							@if($count_club_per_country['Croatia'] != 0)
                                {{$count_club_per_country['Croatia']}} Clubs,
                            @endif
                            @if($count_event_activity_per_country['Croatia'] != 0)
                                {{$count_event_activity_per_country['Croatia']}} Activities,
                            @endif
                            @if($count_event_package_per_country['Croatia'] != 0)
                                {{$count_event_package_per_country['Croatia']}} Packages
                            @endif
						</span>
					</div>
				</div>
			</div>
			<div class="map_svg svg_Croatia"></div>
		</div>

		<div class="svg_cart wrap_svg_Cyprus">
			<div class="name_country">
				Cyprus
				<div class="wrap_prompt_cart">
					<div class="prompt_cart">
						<span class="pc_name">
							Cyprus
						</span>
						<span class="pc_partners">
							@if($count_club_per_country['Cyprus'] != 0)
                                {{$count_club_per_country['Cyprus']}} Clubs,
                            @endif
                            @if($count_event_activity_per_country['Cyprus'] != 0)
                                {{$count_event_activity_per_country['Cyprus']}} Activities,
                            @endif
                            @if($count_event_package_per_country['Cyprus'] != 0)
                                {{$count_event_package_per_country['Cyprus']}} Packages
                            @endif
						</span>
					</div>
				</div>
			</div>
			<div class="map_svg svg_Cyprus"></div>
		</div>

		<div class="svg_cart wrap_svg_Czech">
			<div class="name_country">
				Czech <br> republic
				<div class="wrap_prompt_cart">
					<div class="prompt_cart">
						<span class="pc_name">
							Czech republic
						</span>
						<span class="pc_partners">
							@if($count_club_per_country['Czech Republic'] != 0)
                                {{$count_club_per_country['Czech Republic']}} Clubs,
                            @endif
                            @if($count_event_activity_per_country['Czech Republic'] != 0)
                                {{$count_event_activity_per_country['Czech Republic']}} Activities,
                            @endif
                            @if($count_event_package_per_country['Czech Republic'] != 0)
                                {{$count_event_package_per_country['Czech Republic']}} Packages
                            @endif
						</span>
					</div>
				</div>
			</div>
			<div class="map_svg svg_Czech"></div>
		</div>
		<div class="svg_cart wrap_svg_Estonia">
			<div class="name_country">
				Estonia
				<div class="wrap_prompt_cart">
					<div class="prompt_cart">
						<span class="pc_name">
							Estonia
						</span>
						<span class="pc_partners">
							@if($count_club_per_country['Estonia'] != 0)
                                {{$count_club_per_country['Estonia']}} Clubs,
                            @endif
                            @if($count_event_activity_per_country['Estonia'] != 0)
                                {{$count_event_activity_per_country['Estonia']}} Activities,
                            @endif
                            @if($count_event_package_per_country['Estonia'] != 0)
                                {{$count_event_package_per_country['Estonia']}} Packages
                            @endif
						</span>
					</div>
				</div>
			</div>
			<div class="map_svg svg_Estonia"></div>
		</div>
		<div class="svg_cart wrap_svg_Finland">
			<div class="name_country">
				Finland
				<div class="wrap_prompt_cart">
					<div class="prompt_cart">
						<span class="pc_name">
							Finland
						</span>
						<span class="pc_partners">
							@if($count_club_per_country['Finland'] != 0)
                                {{$count_club_per_country['Finland']}} Clubs,
                            @endif
                            @if($count_event_activity_per_country['Finland'] != 0)
                                {{$count_event_activity_per_country['Finland']}} Activities,
                            @endif
                            @if($count_event_package_per_country['Finland'] != 0)
                                {{$count_event_package_per_country['Finland']}} Packages
                            @endif
						</span>
					</div>
				</div>
			</div>
			<div class="map_svg svg_Finland"></div>
		</div>
		<div class="svg_cart wrap_svg_France">
			<div class="name_country">
				France
				<div class="wrap_prompt_cart">
					<div class="prompt_cart">
						<span class="pc_name">
							France
						</span>
						<span class="pc_partners">
							@if($count_club_per_country['France'] != 0)
                                {{$count_club_per_country['France']}} Clubs,
                            @endif
                            @if($count_event_activity_per_country['France'] != 0)
                                {{$count_event_activity_per_country['France']}} Activities,
                            @endif
                            @if($count_event_package_per_country['France'] != 0)
                                {{$count_event_package_per_country['France']}} Packages
                            @endif
						</span>
					</div>
				</div>
			</div>
			<div class="map_svg svg_France"></div>
		</div>

		<div class="svg_cart wrap_svg_Georgia">
			<div class="name_country">
				Georgia
				<div class="wrap_prompt_cart">
					<div class="prompt_cart">
						<span class="pc_name">
							Georgia
						</span>
						<span class="pc_partners">
							@if($count_club_per_country['Georgia'] != 0)
                                {{$count_club_per_country['Georgia']}} Clubs,
                            @endif
                            @if($count_event_activity_per_country['Georgia'] != 0)
                                {{$count_event_activity_per_country['Georgia']}} Activities,
                            @endif
                            @if($count_event_package_per_country['Georgia'] != 0)
                                {{$count_event_package_per_country['Georgia']}} Packages
                            @endif
						</span>
					</div>
				</div>
			</div>
			<div class="map_svg svg_Georgia"></div>
		</div>
		<div class="svg_cart wrap_svg_Germany">
			<div class="name_country">
				Germany
				<div class="wrap_prompt_cart">
					<div class="prompt_cart">
						<span class="pc_name">
							Germany
						</span>
						<span class="pc_partners">
							@if($count_club_per_country['Germany'] != 0)
                                {{$count_club_per_country['Germany']}} Clubs,
                            @endif
                            @if($count_event_activity_per_country['Germany'] != 0)
                                {{$count_event_activity_per_country['Germany']}} Activities,
                            @endif
                            @if($count_event_package_per_country['Germany'] != 0)
                                {{$count_event_package_per_country['Germany']}} Packages
                            @endif
						</span>
					</div>
				</div>
			</div>
			<div class="map_svg svg_Germany"></div>
		</div>
		<div class="svg_cart wrap_svg_Greece">
			<div class="name_country">
				Greece
				<div class="wrap_prompt_cart">
					<div class="prompt_cart">
						<span class="pc_name">
							Greece
						</span>
						<span class="pc_partners">
							@if($count_club_per_country['Greece'] != 0)
                                {{$count_club_per_country['Greece']}} Clubs,
                            @endif
                            @if($count_event_activity_per_country['Greece'] != 0)
                                {{$count_event_activity_per_country['Greece']}} Activities,
                            @endif
                            @if($count_event_package_per_country['Greece'] != 0)
                                {{$count_event_package_per_country['Greece']}} Packages
                            @endif
						</span>
					</div>
				</div>
			</div>
			<div class="map_svg svg_Greece"></div>
		</div>
		<div class="svg_cart wrap_svg_Hungary">
			<div class="name_country">
				Hungary
				<div class="wrap_prompt_cart">
					<div class="prompt_cart">
						<span class="pc_name">
							Hungary
						</span>
						<span class="pc_partners">
							@if($count_club_per_country['Hungary'] != 0)
                                {{$count_club_per_country['Hungary']}} Clubs,
                            @endif
                            @if($count_event_activity_per_country['Hungary'] != 0)
                                {{$count_event_activity_per_country['Hungary']}} Activities,
                            @endif
                            @if($count_event_package_per_country['Hungary'] != 0)
                                {{$count_event_package_per_country['Hungary']}} Packages
                            @endif
						</span>
					</div>
				</div>
			</div>
			<div class="map_svg svg_Hungary"></div>
		</div>
		<div class="svg_cart wrap_svg_Italy">
			<div class="name_country">
				Italy
				<div class="wrap_prompt_cart">
					<div class="prompt_cart">
						<span class="pc_name">
							Italy
						</span>
						<span class="pc_partners">
							@if($count_club_per_country['Italy'] != 0)
                                {{$count_club_per_country['Italy']}} Clubs,
                            @endif
                            @if($count_event_activity_per_country['Italy'] != 0)
                                {{$count_event_activity_per_country['Italy']}} Activities,
                            @endif
                            @if($count_event_package_per_country['Italy'] != 0)
                                {{$count_event_package_per_country['Italy']}} Packages
                            @endif
						</span>
					</div>
				</div>
			</div>
			<div class="map_svg svg_Italy"></div>
		</div>
		<div class="svg_cart wrap_svg_Latvia">
			<div class="name_country">
				Latvia
				<div class="wrap_prompt_cart">
					<div class="prompt_cart">
						<span class="pc_name">
							Latvia
						</span>
						<span class="pc_partners">
							@if($count_club_per_country['Latvia'] != 0)
                                {{$count_club_per_country['Latvia']}} Clubs,
                            @endif
                            @if($count_event_activity_per_country['Latvia'] != 0)
                                {{$count_event_activity_per_country['Latvia']}} Activities,
                            @endif
                            @if($count_event_package_per_country['Latvia'] != 0)
                                {{$count_event_package_per_country['Latvia']}} Packages
                            @endif
						</span>
					</div>
				</div>
			</div>
			<div class="map_svg svg_Latvia"></div>
		</div>
		<div class="svg_cart wrap_svg_Lithuania">
			<div class="name_country">
				Lithuania
				<div class="wrap_prompt_cart">
					<div class="prompt_cart">
						<span class="pc_name">
							Lithuania
						</span>
						<span class="pc_partners">
							@if($count_club_per_country['Lithuania'] != 0)
                                {{$count_club_per_country['Lithuania']}} Clubs,
                            @endif
                            @if($count_event_activity_per_country['Lithuania'] != 0)
                                {{$count_event_activity_per_country['Lithuania']}} Activities,
                            @endif
                            @if($count_event_package_per_country['Lithuania'] != 0)
                                {{$count_event_package_per_country['Lithuania']}} Packages
                            @endif
						</span>
					</div>
				</div>
			</div>
			<div class="map_svg svg_Lithuania"></div>
		</div>
		<div class="svg_cart wrap_svg_Macedonia">
			<div class="name_country">
				Macedonia
				<div class="wrap_prompt_cart">
					<div class="prompt_cart">
						<span class="pc_name">
							Macedonia
						</span>
						<span class="pc_partners">
							@if($count_club_per_country['Macedonia'] != 0)
                                {{$count_club_per_country['Macedonia']}} Clubs,
                            @endif
                            @if($count_event_activity_per_country['Macedonia'] != 0)
                                {{$count_event_activity_per_country['Macedonia']}} Activities,
                            @endif
                            @if($count_event_package_per_country['Macedonia'] != 0)
                                {{$count_event_package_per_country['Macedonia']}} Packages
                            @endif
						</span>
					</div>
				</div>
			</div>
			<div class="map_svg svg_Macedonia"></div>
		</div>
		<div class="svg_cart wrap_svg_Montenegro">
			<div class="name_country">
				Montenegro
				<div class="wrap_prompt_cart">
					<div class="prompt_cart">
						<span class="pc_name">
							Montenegro
						</span>
						<span class="pc_partners">
							@if($count_club_per_country['Montenegro'] != 0)
                                {{$count_club_per_country['Montenegro']}} Clubs,
                            @endif
                            @if($count_event_activity_per_country['Montenegro'] != 0)
                                {{$count_event_activity_per_country['Montenegro']}} Activities,
                            @endif
                            @if($count_event_package_per_country['Montenegro'] != 0)
                                {{$count_event_package_per_country['Montenegro']}} Packages
                            @endif
						</span>
					</div>
				</div>
			</div>
			<div class="map_svg svg_Montenegro"></div>
		</div>

		<div class="svg_cart wrap_svg_Netherland">
			<div class="name_country">
				Netherland
				<div class="wrap_prompt_cart">
					<div class="prompt_cart">
						<span class="pc_name">
							Netherland
						</span>
						<span class="pc_partners">
							@if($count_club_per_country['Netherland'] != 0)
                                {{$count_club_per_country['Netherland']}} Clubs,
                            @endif
                            @if($count_event_activity_per_country['Netherland'] != 0)
                                {{$count_event_activity_per_country['Netherland']}} Activities,
                            @endif
                            @if($count_event_package_per_country['Netherland'] != 0)
                                {{$count_event_package_per_country['Netherland']}} Packages
                            @endif
						</span>
					</div>
				</div>
			</div>
			<div class="map_svg svg_Netherland"></div>
		</div>

		<div class="svg_cart wrap_svg_Norway">
			<div class="name_country">
				Norway
				<div class="wrap_prompt_cart">
					<div class="prompt_cart">
						<span class="pc_name">
							Norway
						</span>
						<span class="pc_partners">
							@if($count_club_per_country['Norway'] != 0)
                                {{$count_club_per_country['Norway']}} Clubs,
                            @endif
                            @if($count_event_activity_per_country['Norway'] != 0)
                                {{$count_event_activity_per_country['Norway']}} Activities,
                            @endif
                            @if($count_event_package_per_country['Norway'] != 0)
                                {{$count_event_package_per_country['Norway']}} Packages
                            @endif
						</span>
					</div>
				</div>
			</div>
			<div class="map_svg svg_Norway"></div>
		</div>

		<div class="svg_cart wrap_svg_Poland">
			<div class="name_country">
				Poland
				<div class="wrap_prompt_cart">
					<div class="prompt_cart">
						<span class="pc_name">
							Poland
						</span>
						<span class="pc_partners">
							@if($count_club_per_country['Poland'] != 0)
                                {{$count_club_per_country['Poland']}} Clubs,
                            @endif
                            @if($count_event_activity_per_country['Poland'] != 0)
                                {{$count_event_activity_per_country['Poland']}} Activities,
                            @endif
                            @if($count_event_package_per_country['Poland'] != 0)
                                {{$count_event_package_per_country['Poland']}} Packages
                            @endif
						</span>
					</div>
				</div>
			</div>
			<div class="map_svg svg_Poland"></div>
		</div>

		<div class="svg_cart wrap_svg_Portugal">
			<div class="name_country">
				Portugal
				<div class="wrap_prompt_cart">
					<div class="prompt_cart">
						<span class="pc_name">
							Portugal
						</span>
						<span class="pc_partners">
							@if($count_club_per_country['Portugal'] != 0)
                                {{$count_club_per_country['Portugal']}} Clubs,
                            @endif
                            @if($count_event_activity_per_country['Portugal'] != 0)
                                {{$count_event_activity_per_country['Portugal']}} Activities,
                            @endif
                            @if($count_event_package_per_country['Portugal'] != 0)
                                {{$count_event_package_per_country['Portugal']}} Packages
                            @endif
						</span>
					</div>
				</div>
			</div>
			<div class="map_svg svg_Portugal"></div>
		</div>


		<div class="svg_cart wrap_svg_Romania">
			<div class="name_country">
				Romania
				<div class="wrap_prompt_cart">
					<div class="prompt_cart">
						<span class="pc_name">
							Romania
						</span>
						<span class="pc_partners">
							@if($count_club_per_country['Romania'] != 0)
                                {{$count_club_per_country['Romania']}} Clubs,
                            @endif
                            @if($count_event_activity_per_country['Romania'] != 0)
                                {{$count_event_activity_per_country['Romania']}} Activities,
                            @endif
                            @if($count_event_package_per_country['Romania'] != 0)
                                {{$count_event_package_per_country['Romania']}} Packages
                            @endif
						</span>
					</div>
				</div>
			</div>
			<div class="map_svg svg_Romania"></div>
		</div>

		<div class="svg_cart wrap_svg_Russia">
			<div class="name_country">
				Russia
				<div class="wrap_prompt_cart">
					<div class="prompt_cart">
						<span class="pc_name">
							Russia
						</span>
						<span class="pc_partners">
							@if($count_club_per_country['Russia'] != 0)
                                {{$count_club_per_country['Russia']}} Clubs,
                            @endif
                            @if($count_event_activity_per_country['Russia'] != 0)
                                {{$count_event_activity_per_country['Russia']}} Activities,
                            @endif
                            @if($count_event_package_per_country['Russia'] != 0)
                                {{$count_event_package_per_country['Russia']}} Packages
                            @endif
						</span>
					</div>
				</div>
			</div>
			<div class="map_svg svg_Russia"></div>
		</div>

		<div class="svg_cart wrap_svg_Turkey">
			<div class="name_country">
				Turkey
				<div class="wrap_prompt_cart">
					<div class="prompt_cart">
						<span class="pc_name">
							Turkey
						</span>
						<span class="pc_partners">
							@if($count_club_per_country['Turkey'] != 0)
                                {{$count_club_per_country['Turkey']}} Clubs,
                            @endif
                            @if($count_event_activity_per_country['Turkey'] != 0)
                                {{$count_event_activity_per_country['Turkey']}} Activities,
                            @endif
                            @if($count_event_package_per_country['Turkey'] != 0)
                                {{$count_event_package_per_country['Turkey']}} Packages
                            @endif
						</span>
					</div>
				</div>
			</div>
			<div class="map_svg svg_Turkey"></div>
		</div>

		<div class="svg_cart wrap_svg_Serbia">
			<div class="name_country">
				Serbia
				<div class="wrap_prompt_cart">
					<div class="prompt_cart">
						<span class="pc_name">
							Serbia
						</span>
						<span class="pc_partners">
							@if($count_club_per_country['Serbia'] != 0)
                                {{$count_club_per_country['Serbia']}} Clubs,
                            @endif
                            @if($count_event_activity_per_country['Serbia'] != 0)
                                {{$count_event_activity_per_country['Serbia']}} Activities,
                            @endif
                            @if($count_event_package_per_country['Serbia'] != 0)
                                {{$count_event_package_per_country['Serbia']}} Packages
                            @endif
						</span>
					</div>
				</div>
			</div>
			<div class="map_svg svg_Serbia"></div>
		</div>

		<div class="svg_cart wrap_svg_Switzerland">
			<div class="name_country">
				Switzerland
				<div class="wrap_prompt_cart">
					<div class="prompt_cart">
						<span class="pc_name">
							Switzerland
						</span>
						<span class="pc_partners">
							@if($count_club_per_country['Switzerland'] != 0)
                                {{$count_club_per_country['Switzerland']}} Clubs,
                            @endif
                            @if($count_event_activity_per_country['Switzerland'] != 0)
                                {{$count_event_activity_per_country['Switzerland']}} Activities,
                            @endif
                            @if($count_event_package_per_country['Switzerland'] != 0)
                                {{$count_event_package_per_country['Switzerland']}} Packages
                            @endif
						</span>
					</div>
				</div>
			</div>
			<div class="map_svg svg_Switzerland"></div>
		</div>

		<div class="svg_cart wrap_svg_Spain">
			<div class="name_country">
				Spain
				<div class="wrap_prompt_cart">
					<div class="prompt_cart">
						<span class="pc_name">
							Spain
						</span>
						<span class="pc_partners">
							@if($count_club_per_country['Spain'] != 0)
                                {{$count_club_per_country['Spain']}} Clubs,
                            @endif
                            @if($count_event_activity_per_country['Spain'] != 0)
                                {{$count_event_activity_per_country['Spain']}} Activities,
                            @endif
                            @if($count_event_package_per_country['Spain'] != 0)
                                {{$count_event_package_per_country['Spain']}} Packages
                            @endif
						</span>
					</div>
				</div>
			</div>
			<div class="map_svg svg_Spain"></div>
		</div>

		<div class="svg_cart wrap_svg_Sweden">
			<div class="name_country">
				Sweden
				<div class="wrap_prompt_cart">
					<div class="prompt_cart">
						<span class="pc_name">
							Sweden
						</span>
						<span class="pc_partners">
							@if($count_club_per_country['Sweden'] != 0)
                                {{$count_club_per_country['Sweden']}} Clubs,
                            @endif
                            @if($count_event_activity_per_country['Sweden'] != 0)
                                {{$count_event_activity_per_country['Sweden']}} Activities,
                            @endif
                            @if($count_event_package_per_country['Sweden'] != 0)
                                {{$count_event_package_per_country['Sweden']}} Packages
                            @endif
						</span>
					</div>
				</div>
			</div>
			<div class="map_svg svg_Sweden"></div>
		</div>

		<div class="svg_cart wrap_svg_Ukraina">
			<div class="name_country">
				Ukraina
				<div class="wrap_prompt_cart">
					<div class="prompt_cart">
						<span class="pc_name">
							Ukraina
						</span>
						<span class="pc_partners">
							@if($count_club_per_country['Ukraine'] != 0)
                                {{$count_club_per_country['Ukraine']}} Clubs,
                            @endif
                            @if($count_event_activity_per_country['Ukraine'] != 0)
                                {{$count_event_activity_per_country['Ukraine']}} Activities,
                            @endif
                            @if($count_event_package_per_country['Ukraine'] != 0)
                                {{$count_event_package_per_country['Ukraine']}} Packages
                            @endif
						</span>
					</div>
				</div>
			</div>
			<div class="map_svg svg_Ukraina"></div>
		</div>

		<div class="svg_cart wrap_svg_Slovakia">
			<div class="name_country">
					Slovakia
				<div class="wrap_prompt_cart">
					<div class="prompt_cart">
						<span class="pc_name">
						Slovakia
						</span>
						<span class="pc_partners">
							@if($count_club_per_country['Slovakia'] != 0)
                                {{$count_club_per_country['Slovakia']}} Clubs,
                            @endif
                            @if($count_event_activity_per_country['Slovakia'] != 0)
                                {{$count_event_activity_per_country['Slovakia']}} Activities,
                            @endif
                            @if($count_event_package_per_country['Slovakia'] != 0)
                                {{$count_event_package_per_country['Slovakia']}} Packages
                            @endif
						</span>
					</div>
				</div>
			</div>
			<div class="map_svg svg_Slovakia"></div>
		</div>

		<div class="svg_cart wrap_svg_Slovenia">
			<div class="name_country">
				Slovenia
				<div class="wrap_prompt_cart">
					<div class="prompt_cart">
						<span class="pc_name">
							Slovenia
						</span>
						<span class="pc_partners">
							@if($count_club_per_country['Slovenia'] != 0)
                                {{$count_club_per_country['Slovenia']}} Clubs,
                            @endif
                            @if($count_event_activity_per_country['Slovenia'] != 0)
                                {{$count_event_activity_per_country['Slovenia']}} Activities,
                            @endif
                            @if($count_event_package_per_country['Slovenia'] != 0)
                                {{$count_event_package_per_country['Slovenia']}} Packages
                            @endif
						</span>
					</div>
				</div>
			</div>
			<div class="map_svg svg_Slovenia"></div>
		</div>

	</div>



        </div>
        <div class="section1_name" id="here">
            <p class="section1_hr"></p>
            <p><span>{{__('page.faq')}}</span></p>
        </div>
        <div class="support-contact__faq wrapper">
            <div class="support-faq__name">{{ __('page.how_to_buy_a_ticket')}}</div>
            <div class="support-faq__text">{!! $faq->buy_rule !!} </div>
            <div class="support-faq__name">{{ __('page.how to become a member')}}</div>
            <div class="support-faq__text">{!! $faq->member_rule !!}</div>
            <div class="support-faq__name">{{ __('page.what does vip entry mean')}}</div>
            <div class="support-faq__text">{!! $faq->vip_rule !!}</div>
            <div class="support-faq__name"> {{__('page.bonus status')}}</div>
            <div class="support-faq__text">{!! $faq->increase_bonus_rule !!}</div>
            <div class="support-faq__name"> {{__('page.male striptease')}}</div>
            <div class="support-faq__text">{!! $faq->multiple_tickets_rule !!}</div>
            <div class="support-faq__name"> {{__('page.male striptease')}}</div>
            <div class="support-faq__text">{!! $faq->male_striptease_rule !!}</div>
            <div class="support-faq__name"> {{__('page.get support')}}</div>
            <div class="support-faq__text">{!! $faq->support_rule !!}</div>
        </div>
        <div class="section1_name">
            <p class="section1_hr"></p>
            <p><span>24/7 {{__('page.support')}}</span></p>
        </div>
        <div class="section1_subname">{{__('page.contact us')}}</div>
        <div class="support-block wrapper">
            <div class="support-block_soc">
{{--                {{dd($socials)}}--}}
                @php
                  $i = 1;
                @endphp
                @foreach($socials as $social)

                    <a href="{{$social['link']}}" target="_blank">
                        <span class="support-socialitem social@php echo $i++; @endphp"></span>
                    </a>

                @endforeach
{{--							 	<a href="tg://resolve?domain=envymeclub" target="_blank">--}}
{{--								 	<span class="support-socialitem social1"></span>--}}
{{--								 </a>--}}
{{--								<a href="viber://chat?number=%2B37256889223" target="_blank">--}}
{{--									<span class="support-socialitem social2"></span>--}}
{{--								</a>--}}

{{--								<a href="whatsapp://tel:+37256889223" target="_blank">--}}
{{--									<span class="support-socialitem social3"></span>--}}
{{--								</a>--}}

{{--								<a href="tel:+37256889223" target="_blank">--}}
{{--									<span class="support-socialitem social4"></span>--}}
{{--								</a>--}}

{{--								<a href="https://www.facebook.com/envymefb" target="_blank">--}}
{{--									<span class="support-socialitem social5"></span>--}}
{{--								</a>--}}

{{--								<a href="https://www.instagram.com/tallinn_striptease/" target="_blank">--}}
{{--									<span class="support-socialitem social6"></span>--}}
{{--								</a>--}}
						</div>
            <div class="support-block__name">{{__('page.we good at')}}</div>
            <div class="support-block__text1">{{__('page.constantly improving')}}
            </div>
            <div class="support-block__text2"> {{__('page.way to contact us')}}
							<a href="#here">{{__('page.here')}}</a>.
            </div>
            <div class="support-block__text3"></div>
            <div class="support-block__txtsoc">
							<span>{{__('page.follow us')}}</span>
							<div class="soc_wrap2">
								<a href="{{$socials[4]['link']}}">
              	<div class="support-socialitem social0"></div>
								</a>
								<a href="{{$socials[5]['link']}}">
              		<div class="support-socialitem social6"></div>
								</a>
							</div>
						</div>
        </div>
    </section>
    <!-- Footer-->
@endsection
