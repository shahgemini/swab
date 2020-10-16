<?php
function get_enum_values($table, $field)
{
$enum = get_instance();
$sql = "SHOW COLUMNS FROM ".$table." LIKE '$field'";
$result = $enum->db->query($sql);
$row = $result->result_array();
$type = $row[0]['Type'];
preg_match('/enum\((.*)\)$/', $type, $matches);
$matches[1] = str_replace("'", '', $matches[1]);
$vals = explode(',', $matches[1]);
return $vals;
}

function get_range_selectors(){

	$date_now = date("Y-m-d");
	$last_one_week = date('Y-m-d', strtotime("$date_now -7 days"));
	$last_two_week = date('Y-m-d', strtotime("$date_now -14 days"));
	$last_one_month = date('Y-m-d', strtotime("$date_now -1 months"));
	$last_two_month = date('Y-m-d', strtotime("$date_now -2 months"));
	$last_three_month = date('Y-m-d', strtotime("$date_now -3 months"));
	$last_six_month = date('Y-m-d', strtotime("$date_now -6 months"));
	$last_one_year = date('Y-m-d', strtotime("$date_now -12 months"));
	$last_two_year = date('Y-m-d', strtotime("$date_now -24 months"));
	$last_three_year = date('Y-m-d', strtotime("$date_now -3 years"));
	$last_four_year = date('Y-m-d', strtotime("$date_now -4 years"));
	$last_five_year = date('Y-m-d', strtotime("$date_now -5 years"));
	$last_six_year = date('Y-m-d', strtotime("$date_now -6 years"));
	$last_seven_year = date('Y-m-d', strtotime("$date_now -7 years"));
	$last_eight_year = date('Y-m-d', strtotime("$date_now -8 years"));
	$last_nine_year = date('Y-m-d', strtotime("$date_now -9 years"));
	$last_ten_year = date('Y-m-d', strtotime("$date_now -10 years"));

	$array_date = array(
		"Last 1 Week" => $last_one_week,
		"Last 2 Week" => $last_two_week,
		"Last 1 Month" => $last_one_month,
		"Last 2 Months" => $last_two_month,
		"Last 3 Months" => $last_three_month,
		"Last 6 Months" => $last_six_month,
		"Last 1 Year" => $last_one_year,
		"Last 2 Year" => $last_two_year,
		"Last 3 Year" => $last_three_year,
		"Last 4 Year" => $last_four_year,
		"Last 5 Year" => $last_five_year,
		"Last 6 Year" => $last_six_year,
		"Last 7 Year" => $last_seven_year,
		"Last 8 Year" => $last_eight_year,
		"Last 9 Year" => $last_nine_year,
		"Last 10 Year" => $last_ten_year			
	);
	return $array_date;
}
function country_codes()
{
	return array ('93' => 'Afghanistan','358' => 'Åland Islands','355' => 'Albania','213' => 'Algeria','1684' => 'American Samoa','376' => 'Andorra','244' => 'Angola','1264' => 'Anguilla','672' => 'Antarctica','1268' => 'Antigua and Barbuda','54' => 'Argentina','61' => 'Australia','43' => 'Austria','994' => 'Azerbaijan','1242' => 'Bahamas','973' => 'Bahrain','880' => 'Bangladesh','1246' => 'Barbados','375' => 'Belarus','32' => 'Belgium','501' => 'Belize','229' => 'Benin','1441' => 'Bermuda','975' => 'Bhutan','591' => 'Bolivia','387' => 'Bosnia and Herzegovina','267' => 'Botswana','3166' => 'Bouvet Island','55' => 'Brazil','246' => 'British Indian Ocean Territory','673' => 'Brunei Darussalam','359' => 'Bulgaria','226' => 'Burkina Faso','257' => 'Burundi','855' => 'Cambodia','237' => 'Cameroon','1' => 'Canada','238' => 'Cape Verde','1345' => 'Cayman Islands','236' => 'Central African Republic','235' => 'Chad','56' => 'Chile','86' => 'China','61' => 'Christmas Island','61' => 'Cocos (Keeling) Islands','57' => 'Colombia','269' => 'Comoros','242' => 'Congo','682' => 'Cook Islands','506' => 'Costa Rica','506' => "Côte D'Ivoire",'385' => 'Croatia','53' => 'Cuba','357' => 'Cyprus','420' => 'Czech Republic','45' => 'Denmark','253' => 'Djibouti','1767' => 'Dominica','1809' => 'Dominican Republic','593' => 'Ecuador','20' => 'Egypt','503' => 'El Salvador','240' => 'Equatorial Guinea','291' => 'Eritrea','372' => 'Estonia','251' => 'Ethiopia','500' => 'Falkland Islands (Malvinas)','298' => 'Faroe Islands','	679' => 'Fiji','358' => 'Finland','33' => 'France','594' => 'French Guiana','689' => 'French Polynesia','3166' => 'French Southern Territories','241' => 'Gabon','220' => 'Gambia','995' => 'Georgia','49' => 'Germany','233' => 'Ghana','350' => 'Gibraltar','30' => 'Greece','299' => 'Greenland','1473' => 'Grenada','590' => 'Guadeloupe','1671' => 'Guam','502' => 'Guatemala','1481' => 'Guernsey','224' => 'Guinea','245' => 'Guinea-Bissau','592' => 'Guyana','509' => 'Haiti','3166' => 'Heard Island and Mcdonald Islands','379' => 'Vatican City State','504' => 'Honduras','852' => 'Hong Kong','36' => 'Hungary','354' => 'Iceland','91' => 'India','62' => 'Indonesia','98' => 'Iran, Islamic Republic of','964' => 'Iraq','353' => 'Ireland','441624' => 'Isle of Man','972' => 'Israel','39' => 'Italy','1876' => 'Jamaica','81' => 'Japan','441534' => 'Jersey','962' => 'Jordan','7' => 'Kazakhstan','254' => 'KENYA','686' => 'Kiribati','82' => "Korea,Democratic People's Republic of",'82' => 'Korea, Republic of','965' => 'Kuwait','996' => 'Kyrgyzstan','856' => "Lao People's Democratic Republic",'371' => 'Latvia','961' => 'Lebanon','266' => 'Lesotho','231' => 'Liberia','218' => 'Libyan Arab Jamahiriya','423' => 'Liechtenstein','370' => 'Lithuania','351' => 'Luxembourg','853' => 'Macao','389' => 'Macedonia, the Former Yugoslav Republic of','261' => 'Madagascar','265' => 'Malawi','60' => 'Malaysia','960' => 'Maldives','223' => 'Mali','356' => 'Malta','692' => 'Marshall Islands','596' => 'Martinique','222' => 'Mauritania','230' => 'Mauritius','262' => 'Mayotte','52' => 'Mexico','691' => 'Micronesia, Federated States of','MD' => 'Moldova, Republic of','377' => 'Monaco','976' => 'Mongolia','382' => 'Montenegro','1664' => 'Montserrat','212' => 'Morocco','258' => 'Mozambique','95' => 'Myanmar','264' => 'Namibia','674' => 'Nauru','977' => 'Nepal','31' => 'Netherlands','599' => 'Netherlands Antilles','687' => 'New Caledonia','64' => 'New Zealand','505' => 'Nicaragua','227' => 'Niger','234' => 'Nigeria','683' => 'Niue','672' => 'Norfolk Island','1670' => 'Northern Mariana Islands','47' => 'Norway','968' => 'Oman','92' => 'Pakistan','680' => 'Palau','970' => 'Palestinian Territory, Occupied','507' => 'Panama','675' => 'Papua New Guinea','595' => 'Paraguay','51' => 'Peru','63' => 'Philippines','64' => 'Pitcairn','48' => 'Poland','351' => 'Portugal','1787' => 'Puerto Rico','974' => 'Qatar','262' => 'Réunion','40' => 'Romania','7' => 'Russian Federation','250' => 'Rwanda','290' => 'Saint Helena','1869' => 'Saint Kitts and Nevis','1758' => 'Saint Lucia','508' => 'Saint Pierre and Miquelon','1784' => 'Saint Vincent and the Grenadines','685' => 'Samoa','378' => 'San Marino','239' => 'Sao Tome and Principe','966' => 'Saudi Arabia','221' => 'Senegal','281' => 'Serbia','248' => 'Seychelles','232' => 'Sierra Leone','65' => 'Singapore','421' => 'Slovakia','386' => 'Slovenia','677' => 'Solomon Islands','252' => 'Somalia','27' => 'South Africa','500' => 'South Georgia and the South Sandwich Islands','34' => 'Spain','94' => 'Sri Lanka','249' => 'Sudan','597' => 'Suriname','47' => 'Svalbard and Jan Mayen','268' => 'Swaziland','46' => 'Sweden','41' => 'Switzerland','963' => 'Syrian Arab Republic','886' => 'Taiwan, Province of China','992' => 'Tajikistan','255' => 'Tanzania, United Republic of','66' => 'Thailand','670' => 'Timor-Leste','228' => 'Togo','690' => 'Tokelau','676' => 'Tonga','1868' => 'Trinidad and Tobago','216' => 'Tunisia','90' => 'Turkey','993' => 'Turkmenistan','1649' => 'Turks and Caicos Islands','688' => 'Tuvalu','256' => 'Uganda','380' => 'Ukraine','971' => 'United Arab Emirates','44' => 'United Kingdom','1' => 'United States','246' => 'United States Minor Outlying Islands','598' => 'Uruguay','998' => 'Uzbekistan','678' => 'Vanuatu','58' => 'Venezuela','84' => 'Viet Nam','1284' => 'Virgin Islands, British','1' => 'Virgin Islands, U.S.','681' => 'Wallis and Futuna','212' => 'Western Sahara','967' => 'Yemen','260' => 'Zambia','263' => 'Zimbabwe',
);
}
function print_nice($data){
	    echo '<pre>';
	    print_r($data);
	    echo '</pre>';
	}

	function get_email_template(){
		
		$email_template = '<style type="text/css">.mergeRow td {
					}
</style>
<table cellpadding="20" cellspacing="0" height="100%" width="100%">
	<tbody>
		<tr>
			<td align="center">
			<table cellpadding="0" cellspacing="0" style="border: 1px solid #000000; max-width: 600px; width: 100%; margin-left: 0; margin-right: 0;">
				<tbody>
					<tr>
						<td align="center" valign="top">
						<div class="headerBar" style="font-weight: bold; font-size: 20px;  background: #10487f;padding: 20px; border-bottom: 0px solid #000000; height: 20px; color: #FAFAFA;  font-family: Verdana, Helvetica, Arial, sans-serif;">{school_name}</div>
						</td>
					</tr>
					<tr>
						<td align="left" style=" background-color: #ffffff; padding: 15px;  font-family: sans-serif, Verdana, Tahoma, Georgia; font-size: 12px;color: #333333;" valign="top"><!--INPUT EMAIL SIGNUP FORM START-->
						<p>Dear</p>

						<p style="padding:15px;">Hello&nbsp;</p>
						<!--credential table end--><br />
						<br />
						<!--footer school logo and address section start-->
						<table align="left" cellpadding="10" cellspacing="0" style="border-top: 1px solid #CCCCCC;width:100% " width="100%">
							<tbody>
								<tr>
									<td align="right" valign="top"><img src="{school_logo}" width="100px" /></td>
									<td><span>{school_name}</span><br />
									<span style="font-size: 12px;">{school_address1} </span><br />
									<span style="font-size: 12px;">Phone: {school_phone} </span></td>
								</tr>
							</tbody>
						</table>
						<!--FOOTER SECTION POWERED BY TRAIL BLAZER END--></td>
					</tr>
				</tbody>
			</table>
			<!--JAVASCRIPT VALIDATION START--></td>
		</tr>
	</tbody>
</table>

		';
		
		return $email_template;
	}
?>