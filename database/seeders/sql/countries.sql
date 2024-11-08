TRUNCATE TABLE `countries`;
INSERT INTO `countries` (`country_code`, `country_name`, `currency_code`, `fips_code`, `iso_numeric`, `north`, `south`, `east`, `west`, `capital`, `continent_name`, `continent`, `languages`, `iso_alpha3`, `geoname_id`) VALUES
('AD', 'Andorra', 'EUR', 'AN', '020', 42.65604389629997, 42.42849259876837, 1.7865427778319827, 1.4071867141112762, 'Andorra la Vella', 'Europe', 'EU', 'ca', 'AND', 3041565),
('AE', 'United Arab Emirates', 'AED', 'AE', '784', 26.08415985107422, 22.633329391479492, 56.38166046142578, 51.58332824707031, 'Abu Dhabi', 'Asia', 'AS', 'ar-AE,fa,en,hi,ur', 'ARE', 290557),
('AF', 'Afghanistan', 'AFN', 'AF', '004', 38.483418, 29.377472, 74.879448, 60.478443, 'Kabul', 'Asia', 'AS', 'fa-AF,ps,uz-AF,tk', 'AFG', 1149361),
('AG', 'Antigua and Barbuda', 'XCD', 'AC', '028', 17.729387, 16.996979, -61.672421, -61.906425, 'St. John\'s', 'North America', 'NA', 'en-AG', 'ATG', 3576396),
('AI', 'Anguilla', 'XCD', 'AV', '660', 18.283424, 18.166815, -62.971359, -63.172901, 'The Valley', 'North America', 'NA', 'en-AI', 'AIA', 3573511),
('AL', 'Albania', 'ALL', 'AL', '008', 42.665611, 39.648361, 21.068472, 19.293972, 'Tirana', 'Europe', 'EU', 'sq,el', 'ALB', 783754),
('AM', 'Armenia', 'AMD', 'AM', '051', 41.301834, 38.830528, 46.772435045159995, 43.44978, 'Yerevan', 'Asia', 'AS', 'hy', 'ARM', 174982),
('AO', 'Angola', 'AOA', 'AO', '024', -4.376826, -18.042076, 24.082119, 11.679219, 'Luanda', 'Africa', 'AF', 'pt-AO', 'AGO', 3351879),
('AQ', 'Antarctica', '', 'AY', '010', -60.515533, -89.9999, 179.9999, -179.9999, '', 'Antarctica', 'AN', '', 'ATA', 6697173),
('AR', 'Argentina', 'ARS', 'AR', '032', -21.781277, -55.061314, -53.591835, -73.58297, 'Buenos Aires', 'South America', 'SA', 'es-AR,en,it,de,fr,gn', 'ARG', 3865483),
('AS', 'American Samoa', 'USD', 'AQ', '016', -11.0497, -14.382478, -169.416077, -171.091888, 'Pago Pago', 'Oceania', 'OC', 'en-AS,sm,to', 'ASM', 5880801),
('AT', 'Austria', 'EUR', 'AU', '040', 49.0211627691393, 46.3726520216244, 17.1620685652599, 9.53095237240833, 'Vienna', 'Europe', 'EU', 'de-AT,hr,hu,sl', 'AUT', 2782113),
('AU', 'Australia', 'AUD', 'AS', '036', -10.062805, -43.64397, 153.639252, 112.911057, 'Canberra', 'Oceania', 'OC', 'en-AU', 'AUS', 2077456),
('AW', 'Aruba', 'AWG', 'AA', '533', 12.623718127152925, 12.411707706190716, -69.86575120104982, -70.0644737196045, 'Oranjestad', 'North America', 'NA', 'nl-AW,es,en', 'ABW', 3577279),
('AX', 'Åland Islands', 'EUR', '', '248', 60.488861, 59.90675, 21.011862, 19.317694, 'Mariehamn', 'Europe', 'EU', 'sv-AX', 'ALA', 661882),
('AZ', 'Azerbaijan', 'AZN', 'AJ', '031', 41.90564, 38.38915252685547, 50.370083, 44.774113, 'Baku', 'Asia', 'AS', 'az,ru,hy', 'AZE', 587116),
('BA', 'Bosnia and Herzegovina', 'BAM', 'BK', '070', 45.239193, 42.546112, 19.622223, 15.718945, 'Sarajevo', 'Europe', 'EU', 'bs,hr-BA,sr-BA', 'BIH', 3277605),
('BB', 'Barbados', 'BBD', 'BB', '052', 13.327257, 13.039844, -59.420376, -59.648922, 'Bridgetown', 'North America', 'NA', 'en-BB', 'BRB', 3374084),
('BD', 'Bangladesh', 'BDT', 'BG', '050', 26.631945, 20.743334, 92.673668, 88.028336, 'Dhaka', 'Asia', 'AS', 'bn-BD,en', 'BGD', 1210997),
('BE', 'Belgium', 'EUR', 'BE', '056', 51.505444, 49.49361, 6.403861, 2.546944, 'Brussels', 'Europe', 'EU', 'nl-BE,fr-BE,de-BE', 'BEL', 2802361),
('BF', 'Burkina Faso', 'XOF', 'UV', '854', 15.082593, 9.401108, 2.405395, -5.518916, 'Ouagadougou', 'Africa', 'AF', 'fr-BF', 'BFA', 2361809),
('BG', 'Bulgaria', 'BGN', 'BU', '100', 44.21764, 41.242084, 28.612167, 22.371166, 'Sofia', 'Europe', 'EU', 'bg,tr-BG,rom', 'BGR', 732800),
('BH', 'Bahrain', 'BHD', 'BA', '048', 26.282583, 25.796862, 50.664471, 50.45414, 'Manama', 'Asia', 'AS', 'ar-BH,en,fa,ur', 'BHR', 290291),
('BI', 'Burundi', 'BIF', 'BY', '108', -2.310123, -4.465713, 30.847729, 28.993061, 'Bujumbura', 'Africa', 'AF', 'fr-BI,rn', 'BDI', 433561),
('BJ', 'Benin', 'XOF', 'BN', '204', 12.418347, 6.225748, 3.851701, 0.774575, 'Porto-Novo', 'Africa', 'AF', 'fr-BJ', 'BEN', 2395170),
('BL', 'Saint Barthélemy', 'EUR', 'TB', '652', 17.928808791949283, 17.878183227405575, -62.788983372985854, -62.8739118253784, 'Gustavia', 'North America', 'NA', 'fr', 'BLM', 3578476),
('BM', 'Bermuda', 'BMD', 'BD', '060', 32.393833, 32.246639, -64.651993, -64.89605, 'Hamilton', 'North America', 'NA', 'en-BM,pt', 'BMU', 3573345),
('BN', 'Brunei Darussalam', 'BND', 'BX', '096', 5.047167, 4.003083, 115.359444, 114.071442, 'Bandar Seri Begawan', 'Asia', 'AS', 'ms-BN,en-BN', 'BRN', 1820814),
('BO', 'Bolivia', 'BOB', 'BL', '068', -9.680567, -22.896133, -57.45809600000001, -69.640762, 'Sucre', 'South America', 'SA', 'es-BO,qu,ay', 'BOL', 3923057),
('BQ', 'Bonaire, Sint Eustatius and Saba', 'USD', '', '535', 12.304535, 12.017149, -68.192307, -68.416458, '', 'North America', 'NA', 'nl,pap,en', 'BES', 7626844),
('BR', 'Brazil', 'BRL', 'BR', '076', 5.264877, -33.750706, -32.392998, -73.985535, 'Brasília', 'South America', 'SA', 'pt-BR,es,en,fr', 'BRA', 3469034),
('BS', 'Bahamas', 'BSD', 'BF', '044', 26.919243, 22.852743, -74.423874, -78.995911, 'Nassau', 'North America', 'NA', 'en-BS', 'BHS', 3572887),
('BT', 'Bhutan', 'BTN', 'BT', '064', 28.323778, 26.70764, 92.125191, 88.75972, 'Thimphu', 'Asia', 'AS', 'dz', 'BTN', 1252634),
('BV', 'Bouvet Island', 'NOK', 'BV', '074', -54.400322, -54.462383, 3.487976, 3.335499, '', 'Antarctica', 'AN', '', 'BVT', 3371123),
('BW', 'Botswana', 'BWP', 'BC', '072', -17.780813, -26.907246, 29.360781, 19.999535, 'Gaborone', 'Africa', 'AF', 'en-BW,tn-BW', 'BWA', 933860),
('BY', 'Belarus', 'BYR', 'BO', '112', 56.165806, 51.256416, 32.770805, 23.176889, 'Minsk', 'Europe', 'EU', 'be,ru', 'BLR', 630336),
('BZ', 'Belize', 'BZD', 'BH', '084', 18.496557, 15.8893, -87.776985, -89.224815, 'Belmopan', 'North America', 'NA', 'en-BZ,es', 'BLZ', 3582678),
('CA', 'Canada', 'CAD', 'CA', '124', 83.110626, 41.67598, -52.636291, -141, 'Ottawa', 'North America', 'NA', 'en-CA,fr-CA,iu', 'CAN', 6251999),
('CC', 'Cocos [Keeling] Islands', 'AUD', 'CK', '166', -12.072459094, -12.208725839, 96.929489344, 96.816941408, 'West Island', 'Asia', 'AS', 'ms-CC,en', 'CCK', 1547376),
('CD', 'Democratic Republic of the Congo', 'COD', 'CD', '180', 5.386098, -13.455675, 31.305912, 12.204144, 'Kinshasa', 'Africa', 'AF', 'fr-CD,ln,kg', 'COD', 203312),
('CF', 'Central African Republic', 'XAF', 'CT', '140', 11.007569, 2.220514, 27.463421, 14.420097, 'Bangui', 'Africa', 'AF', 'fr-CF,sg,ln,kg', 'CAF', 239880),
('CG', 'Republic of the Congo', 'XAF', 'CF', '178', 3.703082, -5.027223, 18.649839, 11.205009, 'Brazzaville', 'Africa', 'AF', 'fr-CG,kg,ln-CG', 'COG', 2260494),
('CH', 'Switzerland', 'CHF', 'SZ', '756', 47.805332, 45.825695, 10.491472, 5.957472, 'Berne', 'Europe', 'EU', 'de-CH,fr-CH,it-CH,rm', 'CHE', 2658434),
('CI', 'Ivory Coast', 'XOF', 'IV', '384', 10.736642, 4.357067, -2.494897, -8.599302, 'Yamoussoukro', 'Africa', 'AF', 'fr-CI', 'CIV', 2287781),
('CK', 'Cook Islands', 'NZD', 'CW', '184', -10.023114, -21.944164, -157.312134, -161.093658, 'Avarua', 'Oceania', 'OC', 'en-CK,mi', 'COK', 1899402),
('CL', 'Chile', 'CLP', 'CI', '152', -17.507553, -55.9256225109217, -66.417557, -80.785851, 'Santiago', 'South America', 'SA', 'es-CL', 'CHL', 3895114),
('CM', 'Cameroon', 'XAF', 'CM', '120', 13.078056, 1.652548, 16.192116, 8.494763, 'Yaoundé', 'Africa', 'AF', 'en-CM,fr-CM', 'CMR', 2233387),
('CN', 'China', 'CNY', 'CH', '156', 53.56086, 15.775416, 134.773911, 73.557693, 'Beijing', 'Asia', 'AS', 'zh-CN,yue,wuu,dta,ug,za', 'CHN', 1814991),
('CO', 'Colombia', 'COP', 'CO', '170', 13.380502, -4.225869, -66.869835, -81.728111, 'Bogotá', 'South America', 'SA', 'es-CO', 'COL', 3686110),
('CR', 'Costa Rica', 'CRC', 'CS', '188', 11.216819, 8.032975, -82.555992, -85.950623, 'San José', 'North America', 'NA', 'es-CR,en', 'CRI', 3624060),
('CU', 'Cuba', 'CUP', 'CU', '192', 23.226042, 19.828083, -74.131775, -84.957428, 'Havana', 'North America', 'NA', 'es-CU', 'CUB', 3562981),
('CV', 'Cape Verde', 'CVE', 'CV', '132', 17.197178, 14.808022, -22.669443, -25.358747, 'Praia', 'Africa', 'AF', 'pt-CV', 'CPV', 3374766),
('CW', 'Curaçao', 'ANG', 'UC', '531', 12.385672, 12.032745, -68.733948, -69.157204, 'Willemstad', 'North America', 'NA', 'nl,pap', 'CUW', 7626836),
('CX', 'Christmas Island', 'AUD', 'KT', '162', -10.412356007, -10.5704829995, 105.712596992, 105.533276992, 'The Settlement', 'Asia', 'AS', 'en,zh,ms-CC', 'CXR', 2078138),
('CY', 'Cyprus', 'EUR', 'CY', '196', 35.701527, 34.6332846722908, 34.59791599999994, 32.27308300000004, 'Nicosia', 'Europe', 'EU', 'el-CY,tr-CY,en', 'CYP', 146669),
('CZ', 'Czech Republic', 'CZK', 'EZ', '203', 51.058887, 48.542915, 18.860111, 12.096194, 'Prague', 'Europe', 'EU', 'cs,sk', 'CZE', 3077311),
('DE', 'Germany', 'EUR', 'GM', '276', 55.055637, 47.275776, 15.039889, 5.865639, 'Berlin', 'Europe', 'EU', 'de', 'DEU', 2921044),
('DJ', 'Djibouti', 'DJF', 'DJ', '262', 12.706833, 10.909917, 43.416973, 41.773472, 'Djibouti', 'Africa', 'AF', 'fr-DJ,ar,so-DJ,aa', 'DJI', 223816),
('DK', 'Denmark', 'DKK', 'DA', '208', 57.748417, 54.562389, 15.158834, 8.075611, 'Copenhagen', 'Europe', 'EU', 'da-DK,en,fo,de-DK', 'DNK', 2623032),
('DM', 'Dominica', 'XCD', 'DO', '212', 15.631809, 15.20169, -61.244152, -61.484108, 'Roseau', 'North America', 'NA', 'en-DM', 'DMA', 3575830),
('DO', 'Dominican Republic', 'DOP', 'DR', '214', 19.929859, 17.543159, -68.32, -72.003487, 'Santo Domingo', 'North America', 'NA', 'es-DO', 'DOM', 3508796),
('DZ', 'Algeria', 'DZD', 'AG', '012', 37.093723, 18.960028, 11.979548, -8.673868, 'Algiers', 'Africa', 'AF', 'ar-DZ', 'DZA', 2589581),
('EC', 'Ecuador', 'USD', 'EC', '218', 1.43902, -4.998823, -75.184586, -81.078598, 'Quito', 'South America', 'SA', 'es-EC', 'ECU', 3658394),
('EE', 'Estonia', 'EUR', 'EN', '233', 59.676224, 57.516193, 28.209972, 21.837584, 'Tallinn', 'Europe', 'EU', 'et,ru', 'EST', 453733),
('EG', 'Egypt', 'EGP', 'EG', '818', 31.667334, 21.725389, 36.89833068847656, 24.698111, 'Cairo', 'Africa', 'AF', 'ar-EG,en,fr', 'EGY', 357994),
('EH', 'Western Sahara', 'MAD', 'WI', '732', 27.669674, 20.774158, -8.670276, -17.103182, 'El Aaiún', 'Africa', 'AF', 'ar,mey', 'ESH', 2461445),
('ER', 'Eritrea', 'ERN', 'ER', '232', 18.003084, 12.359555, 43.13464, 36.438778, 'Asmara', 'Africa', 'AF', 'aa-ER,ar,tig,kun,ti-ER', 'ERI', 338010),
('ES', 'Spain', 'EUR', 'SP', '724', 43.7913565913767, 36.0001044260548, 4.32778473043961, -9.30151567231899, 'Madrid', 'Europe', 'EU', 'es-ES,ca,gl,eu,oc', 'ESP', 2510769),
('ET', 'Ethiopia', 'ETB', 'ET', '231', 14.89375, 3.402422, 47.986179, 32.999939, 'Addis Ababa', 'Africa', 'AF', 'am,en-ET,om-ET,ti-ET,so-ET,sid', 'ETH', 337996),
('FI', 'Finland', 'EUR', 'FI', '246', 70.096054, 59.808777, 31.580944, 20.556944, 'Helsinki', 'Europe', 'EU', 'fi-FI,sv-FI,smn', 'FIN', 660013),
('FJ', 'Fiji', 'FJD', 'FJ', '242', -12.480111, -20.67597, -178.424438, 177.129334, 'Suva', 'Oceania', 'OC', 'en-FJ,fj', 'FJI', 2205218),
('FK', 'Falkland Islands', 'FKP', 'FK', '238', -51.24065, -52.360512, -57.712486, -61.345192, 'Stanley', 'South America', 'SA', 'en-FK', 'FLK', 3474414),
('FM', 'Micronesia', 'USD', 'FM', '583', 10.08904, 1.02629, 163.03717, 137.33648, 'Palikir', 'Oceania', 'OC', 'en-FM,chk,pon,yap,kos,uli,woe,nkr,kpg', 'FSM', 2081918),
('FO', 'Faroe Islands', 'DKK', 'FO', '234', 62.400749, 61.394943, -6.399583, -7.458, 'Tórshavn', 'Europe', 'EU', 'fo,da-FO', 'FRO', 2622320),
('FR', 'France', 'EUR', 'FR', '250', 51.092804, 41.371582, 9.561556, -5.142222, 'Paris', 'Europe', 'EU', 'fr-FR,frp,br,co,ca,eu,oc', 'FRA', 3017382),
('GA', 'Gabon', 'XAF', 'GB', '266', 2.322612, -3.978806, 14.502347, 8.695471, 'Libreville', 'Africa', 'AF', 'fr-GA', 'GAB', 2400553),
('GB', 'United Kingdom of Great Britain and Northern Ireland', 'GBP', 'UK', '826', 59.360249, 49.906193, 1.759, -8.623555, 'London', 'Europe', 'EU', 'en-GB,cy-GB,gd', 'GBR', 2635167),
('GD', 'Grenada', 'XCD', 'GJ', '308', 12.318283928171299, 11.986893, -61.57676970108031, -61.802344, 'St. George\'s', 'North America', 'NA', 'en-GD', 'GRD', 3580239),
('GE', 'Georgia', 'GEL', 'GG', '268', 43.586498, 41.053196, 46.725971, 40.010139, 'Tbilisi', 'Asia', 'AS', 'ka,ru,hy,az', 'GEO', 614540),
('GF', 'French Guiana', 'EUR', 'FG', '254', 5.776496, 2.127094, -51.613949, -54.542511, 'Cayenne', 'South America', 'SA', 'fr-GF', 'GUF', 3381670),
('GG', 'Guernsey', 'GBP', 'GK', '831', 49.731727816705416, 49.40764156876899, -2.1577152112246267, -2.673194593476069, 'St Peter Port', 'Europe', 'EU', 'en,fr', 'GGY', 3042362),
('GH', 'Ghana', 'GHS', 'GH', '288', 11.173301, 4.736723, 1.191781, -3.25542, 'Accra', 'Africa', 'AF', 'en-GH,ak,ee,tw', 'GHA', 2300660),
('GI', 'Gibraltar', 'GIP', 'GI', '292', 36.155439135670726, 36.10903070140248, -5.338285164001491, -5.36626149743654, 'Gibraltar', 'Europe', 'EU', 'en-GI,es,it,pt', 'GIB', 2411586),
('GL', 'Greenland', 'DKK', 'GL', '304', 83.627357, 59.777401, -11.312319, -73.04203, 'Nuuk', 'North America', 'NA', 'kl,da-GL,en', 'GRL', 3425505),
('GM', 'Gambia', 'GMD', 'GA', '270', 13.826571, 13.064252, -13.797793, -16.825079, 'Banjul', 'Africa', 'AF', 'en-GM,mnk,wof,wo,ff', 'GMB', 2413451),
('GN', 'Guinea', 'GNF', 'GV', '324', 12.67622, 7.193553, -7.641071, -14.926619, 'Conakry', 'Africa', 'AF', 'fr-GN', 'GIN', 2420477),
('GP', 'Guadeloupe', 'EUR', 'GP', '312', 16.516848, 15.867565, -61, -61.544765, 'Basse-Terre', 'North America', 'NA', 'fr-GP', 'GLP', 3579143),
('GQ', 'Equatorial Guinea', 'XAF', 'EK', '226', 2.346989, 0.92086, 11.335724, 9.346865, 'Malabo', 'Africa', 'AF', 'es-GQ,fr', 'GNQ', 2309096),
('GR', 'Greece', 'EUR', 'GR', '300', 41.7484999849641, 34.8020663391466, 28.2470831714347, 19.3736035624134, 'Athens', 'Europe', 'EU', 'el-GR,en,fr', 'GRC', 390903),
('GS', 'South Georgia and the South Sandwich Islands', 'GBP', 'SX', '239', -53.970467, -59.479259, -26.229326, -38.021175, 'Grytviken', 'Antarctica', 'AN', 'en', 'SGS', 3474415),
('GT', 'Guatemala', 'GTQ', 'GT', '320', 17.81522, 13.737302, -88.223198, -92.23629, 'Guatemala City', 'North America', 'NA', 'es-GT', 'GTM', 3595528),
('GU', 'Guam', 'USD', 'GQ', '316', 13.654402, 13.23376, 144.956894, 144.61806, 'Hagåtña', 'Oceania', 'OC', 'en-GU,ch-GU', 'GUM', 4043988),
('GW', 'Guinea-Bissau', 'XOF', 'PU', '624', 12.680789, 10.924265, -13.636522, -16.717535, 'Bissau', 'Africa', 'AF', 'pt-GW,pov', 'GNB', 2372248),
('GY', 'Guyana', 'GYD', 'GY', '328', 8.557567, 1.17508, -56.480251, -61.384762, 'Georgetown', 'South America', 'SA', 'en-GY', 'GUY', 3378535),
('HK', 'Hong Kong', 'HKD', 'HK', '344', 22.559778, 22.15325, 114.434753, 113.837753, 'Hong Kong', 'Asia', 'AS', 'zh-HK,yue,zh,en', 'HKG', 1819730),
('HM', 'Heard Island and McDonald Islands', 'AUD', 'HM', '334', -52.909416, -53.192001, 73.859146, 72.596535, '', 'Antarctica', 'AN', '', 'HMD', 1547314),
('HN', 'Honduras', 'HNL', 'HO', '340', 16.510256, 12.982411, -83.155403, -89.350792, 'Tegucigalpa', 'North America', 'NA', 'es-HN', 'HND', 3608932),
('HR', 'Croatia', 'HRK', 'HR', '191', 46.53875, 42.43589, 19.427389, 13.493222, 'Zagreb', 'Europe', 'EU', 'hr-HR,sr', 'HRV', 3202326),
('HT', 'Haiti', 'HTG', 'HA', '332', 20.08782, 18.021032, -71.613358, -74.478584, 'Port-au-Prince', 'North America', 'NA', 'ht,fr-HT', 'HTI', 3723988),
('HU', 'Hungary', 'HUF', 'HU', '348', 48.585667, 45.74361, 22.906, 16.111889, 'Budapest', 'Europe', 'EU', 'hu-HU', 'HUN', 719819),
('ID', 'Indonesia', 'IDR', 'ID', '360', 5.904417, -10.941861, 141.021805, 95.009331, 'Jakarta', 'Asia', 'AS', 'id,en,nl,jv', 'IDN', 1643084),
('IE', 'Ireland', 'EUR', 'EI', '372', 55.387917, 51.451584, -6.002389, -10.478556, 'Dublin', 'Europe', 'EU', 'en-IE,ga-IE', 'IRL', 2963597),
('IL', 'Israel', 'ILS', 'IS', '376', 33.340137, 29.496639, 35.876804, 34.270278754419145, '', 'Asia', 'AS', 'he,ar-IL,en-IL,', 'ISR', 294640),
('IM', 'Isle of Man', 'GBP', 'IM', '833', 54.419724, 54.055916, -4.3115, -4.798722, 'Douglas', 'Europe', 'EU', 'en,gv', 'IMN', 3042225),
('IN', 'India', 'INR', 'IN', '356', 35.504223, 6.747139, 97.403305, 68.186691, 'New Delhi', 'Asia', 'AS', 'en-IN,hi,bn,te,mr,ta,ur,gu,kn,ml,or,pa,as,bh,sat,ks,ne,sd,kok,doi,mni,sit,sa,fr,lus,inc', 'IND', 1269750),
('IO', 'British Indian Ocean Territory', 'USD', 'IO', '086', -5.268333, -7.438028, 72.493164, 71.259972, '', 'Asia', 'AS', 'en-IO', 'IOT', 1282588),
('IQ', 'Iraq', 'IQD', 'IZ', '368', 37.378029, 29.069445, 48.575916, 38.795887, 'Baghdad', 'Asia', 'AS', 'ar-IQ,ku,hy', 'IRQ', 99237),
('IR', 'Iran', 'IRR', 'IR', '364', 39.777222, 25.064083, 63.317471, 44.047279, 'Tehran', 'Asia', 'AS', 'fa-IR,ku', 'IRN', 130758),
('IS', 'Iceland', 'ISK', 'IC', '352', 66.53463, 63.393253, -13.495815, -24.546524, 'Reykjavik', 'Europe', 'EU', 'is,en,de,da,sv,no', 'ISL', 2629691),
('IT', 'Italy', 'EUR', 'IT', '380', 47.095196, 36.652779, 18.513445, 6.614889, 'Rome', 'Europe', 'EU', 'it-IT,de-IT,fr-IT,sc,ca,co,sl', 'ITA', 3175395),
('JE', 'Jersey', 'GBP', 'JE', '832', 49.265057, 49.169834, -2.022083, -2.260028, 'Saint Helier', 'Europe', 'EU', 'en,pt', 'JEY', 3042142),
('JM', 'Jamaica', 'JMD', 'JM', '388', 18.526976, 17.703554, -76.180321, -78.366638, 'Kingston', 'North America', 'NA', 'en-JM', 'JAM', 3489940),
('JO', 'Jordan', 'JOD', 'JO', '400', 33.367668, 29.185888, 39.301167, 34.959999, 'Amman', 'Asia', 'AS', 'ar-JO,en', 'JOR', 248816),
('JP', 'Japan', 'JPY', 'JA', '392', 45.52314, 24.249472, 145.820892, 122.93853, 'Tokyo', 'Asia', 'AS', 'ja', 'JPN', 1861060),
('KE', 'Kenya', 'KES', 'KE', '404', 5.019938, -4.678047, 41.899078, 33.908859, 'Nairobi', 'Africa', 'AF', 'en-KE,sw-KE', 'KEN', 192950),
('KG', 'Kyrgyzstan', 'KGS', 'KG', '417', 43.238224, 39.172832, 80.283165, 69.276611, 'Bishkek', 'Asia', 'AS', 'ky,uz,ru', 'KGZ', 1527747),
('KH', 'Cambodia', 'KHR', 'CB', '116', 14.686417, 10.409083, 107.627724, 102.339996, 'Phnom Penh', 'Asia', 'AS', 'km,fr,en', 'KHM', 1831722),
('KI', 'Kiribati', 'AUD', 'KR', '296', 4.71957, -11.446881150186856, -150.215347, 169.556137, 'Tarawa', 'Oceania', 'OC', 'en-KI,gil', 'KIR', 4030945),
('KM', 'Comoros', 'KMF', 'CN', '174', -11.362381, -12.387857, 44.538223, 43.21579, 'Moroni', 'Africa', 'AF', 'ar,fr-KM', 'COM', 921929),
('KN', 'Saint Kitts and Nevis', 'XCD', 'SC', '659', 17.420118, 17.095343, -62.543266, -62.86956, 'Basseterre', 'North America', 'NA', 'en-KN', 'KNA', 3575174),
('KP', 'North Korea', 'KPW', 'KN', '408', 43.006054, 37.673332, 130.674866, 124.315887, 'Pyongyang', 'Asia', 'AS', 'ko-KP', 'PRK', 1873107),
('KR', 'South Korea', 'KRW', 'KS', '410', 38.612446, 33.190945, 129.584671, 125.887108, 'Seoul', 'Asia', 'AS', 'ko-KR,en', 'KOR', 1835841),
('KW', 'Kuwait', 'KWD', 'KU', '414', 30.095945, 28.524611, 48.431473, 46.555557, 'Kuwait City', 'Asia', 'AS', 'ar-KW,en', 'KWT', 285570),
('KY', 'Cayman Islands', 'KYD', 'CJ', '136', 19.7617, 19.263029, -79.727272, -81.432777, 'George Town', 'North America', 'NA', 'en-KY', 'CYM', 3580718),
('KZ', 'Kazakhstan', 'KZT', 'KZ', '398', 55.451195, 40.936333, 87.312668, 46.491859, 'Astana', 'Asia', 'AS', 'kk,ru', 'KAZ', 1522867),
('LA', 'Laos', 'LAK', 'LA', '418', 22.500389, 13.910027, 107.697029, 100.093056, 'Vientiane', 'Asia', 'AS', 'lo,fr,en', 'LAO', 1655842),
('LB', 'Lebanon', 'LBP', 'LE', '422', 34.691418, 33.05386, 36.639194, 35.114277, 'Beirut', 'Asia', 'AS', 'ar-LB,fr-LB,en,hy', 'LBN', 272103),
('LC', 'Saint Lucia', 'XCD', 'ST', '662', 14.103245, 13.704778, -60.874203, -61.07415, 'Castries', 'North America', 'NA', 'en-LC', 'LCA', 3576468),
('LI', 'Liechtenstein', 'CHF', 'LS', '438', 47.2706251386959, 47.0484284123471, 9.63564281136796, 9.47167359782014, 'Vaduz', 'Europe', 'EU', 'de-LI', 'LIE', 3042058),
('LK', 'Sri Lanka', 'LKR', 'CE', '144', 9.831361, 5.916833, 81.881279, 79.652916, 'Colombo', 'Asia', 'AS', 'si,ta,en', 'LKA', 1227603),
('LR', 'Liberia', 'LRD', 'LI', '430', 8.551791, 4.353057, -7.365113, -11.492083, 'Monrovia', 'Africa', 'AF', 'en-LR', 'LBR', 2275384),
('LS', 'Lesotho', 'LSL', 'LT', '426', -28.572058, -30.668964, 29.465761, 27.029068, 'Maseru', 'Africa', 'AF', 'en-LS,st,zu,xh', 'LSO', 932692),
('LT', 'Lithuania', 'EUR', 'LH', '440', 56.446918, 53.901306, 26.871944, 20.941528, 'Vilnius', 'Europe', 'EU', 'lt,ru,pl', 'LTU', 597427),
('LU', 'Luxembourg', 'EUR', 'LU', '442', 50.184944, 49.446583, 6.528472, 5.734556, 'Luxembourg', 'Europe', 'EU', 'lb,de-LU,fr-LU', 'LUX', 2960313),
('LV', 'Latvia', 'EUR', 'LG', '428', 58.082306, 55.668861, 28.241167, 20.974277, 'Riga', 'Europe', 'EU', 'lv,ru,lt', 'LVA', 458258),
('LY', 'Libya', 'LYD', 'LY', '434', 33.168999, 19.508045, 25.150612, 9.38702, 'Tripoli', 'Africa', 'AF', 'ar-LY,it,en', 'LBY', 2215636),
('MA', 'Morocco', 'MAD', 'MO', '504', 35.9224966985384, 27.662115, -0.991750000000025, -13.168586, 'Rabat', 'Africa', 'AF', 'ar-MA,fr', 'MAR', 2542007),
('MC', 'Monaco', 'EUR', 'MN', '492', 43.75196717037228, 43.72472839869377, 7.439939260482788, 7.408962249755859, 'Monaco', 'Europe', 'EU', 'fr-MC,en,it', 'MCO', 2993457),
('MD', 'Moldova', 'MDL', 'MD', '498', 48.490166, 45.468887, 30.135445, 26.618944, 'Chişinău', 'Europe', 'EU', 'ro,ru,gag,tr', 'MDA', 617790),
('ME', 'Montenegro', 'EUR', 'MJ', '499', 43.570137, 41.850166, 20.358833, 18.461306, 'Podgorica', 'Europe', 'EU', 'sr,hu,bs,sq,hr,rom', 'MNE', 3194884),
('MF', 'Saint Martin', 'EUR', 'RN', '663', 18.130354, 18.052231, -63.012993, -63.152767, 'Marigot', 'North America', 'NA', 'fr', 'MAF', 3578421),
('MG', 'Madagascar', 'MGA', 'MA', '450', -11.945433, -25.608952, 50.48378, 43.224876, 'Antananarivo', 'Africa', 'AF', 'fr-MG,mg', 'MDG', 1062947),
('MH', 'Marshall Islands', 'USD', 'RM', '584', 14.62, 5.587639, 171.931808, 165.524918, 'Majuro', 'Oceania', 'OC', 'mh,en-MH', 'MHL', 2080185),
('MK', 'North Macedonia', 'MKD', 'MK', '807', 42.361805, 40.860195, 23.038139, 20.464695, 'Skopje', 'Europe', 'EU', 'mk,sq,tr,rmm,sr', 'MKD', 718075),
('ML', 'Mali', 'XOF', 'ML', '466', 25.000002, 10.159513, 4.244968, -12.242614, 'Bamako', 'Africa', 'AF', 'fr-ML,bm', 'MLI', 2453866),
('MM', 'Myanmar [Burma]', 'MMK', 'BM', '104', 28.543249, 9.784583, 101.176781, 92.189278, 'Nay Pyi Taw', 'Asia', 'AS', 'my', 'MMR', 1327865),
('MN', 'Mongolia', 'MNT', 'MG', '496', 52.154251, 41.567638, 119.924309, 87.749664, 'Ulan Bator', 'Asia', 'AS', 'mn,ru', 'MNG', 2029969),
('MO', 'Macao', 'MOP', 'MC', '446', 22.222334, 22.180389, 113.565834, 113.528946, 'Macao', 'Asia', 'AS', 'zh,zh-MO,pt', 'MAC', 1821275),
('MP', 'Northern Mariana Islands', 'USD', 'CQ', '580', 20.55344, 14.11023, 146.06528, 144.88626, 'Saipan', 'Oceania', 'OC', 'fil,tl,zh,ch-MP,en-MP', 'MNP', 4041468),
('MQ', 'Martinique', 'EUR', 'MB', '474', 14.878819, 14.392262, -60.81551, -61.230118, 'Fort-de-France', 'North America', 'NA', 'fr-MQ', 'MTQ', 3570311),
('MR', 'Mauritania', 'MRO', 'MR', '478', 27.298073, 14.715547, -4.827674, -17.066521, 'Nouakchott', 'Africa', 'AF', 'ar-MR,fuc,snk,fr,mey,wo', 'MRT', 2378080),
('MS', 'Montserrat', 'XCD', 'MH', '500', 16.824060205313184, 16.674768935441556, -62.144100129608205, -62.24138237036129, 'Plymouth', 'North America', 'NA', 'en-MS', 'MSR', 3578097),
('MT', 'Malta', 'EUR', 'MT', '470', 36.0821530995456, 35.8061835000002, 14.5764915000002, 14.1834251000001, 'Valletta', 'Europe', 'EU', 'mt,en-MT', 'MLT', 2562770),
('MU', 'Mauritius', 'MUR', 'MP', '480', -10.319255, -20.525717, 63.500179, 56.512718, 'Port Louis', 'Africa', 'AF', 'en-MU,bho,fr', 'MUS', 934292),
('MV', 'Maldives', 'MVR', 'MV', '462', 7.091587495414767, -0.692694, 73.637276, 72.693222, 'Malé', 'Asia', 'AS', 'dv,en', 'MDV', 1282028),
('MW', 'Malawi', 'MWK', 'MI', '454', -9.367541, -17.125, 35.916821, 32.67395, 'Lilongwe', 'Africa', 'AF', 'ny,yao,tum,swk', 'MWI', 927384),
('MX', 'Mexico', 'MXN', 'MX', '484', 32.716759, 14.532866, -86.703392, -118.453949, 'Mexico City', 'North America', 'NA', 'es-MX', 'MEX', 3996063),
('MY', 'Malaysia', 'MYR', 'MY', '458', 7.363417, 0.855222, 119.267502, 99.643448, 'Kuala Lumpur', 'Asia', 'AS', 'ms-MY,en,zh,ta,te,ml,pa,th', 'MYS', 1733045),
('MZ', 'Mozambique', 'MZN', 'MZ', '508', -10.471883, -26.868685, 40.842995, 30.217319, 'Maputo', 'Africa', 'AF', 'pt-MZ,vmw', 'MOZ', 1036973),
('NA', 'Namibia', 'NAD', 'WA', '516', -16.959894, -28.97143, 25.256701, 11.71563, 'Windhoek', 'Africa', 'AF', 'en-NA,af,de,hz,naq', 'NAM', 3355338),
('NC', 'New Caledonia', 'XPF', 'NC', '540', -19.549778, -22.698, 168.129135, 163.564667, 'Noumea', 'Oceania', 'OC', 'fr-NC', 'NCL', 2139685),
('NE', 'Niger', 'XOF', 'NG', '562', 23.525026, 11.696975, 15.995643, 0.16625, 'Niamey', 'Africa', 'AF', 'fr-NE,ha,kr,dje', 'NER', 2440476),
('NF', 'Norfolk Island', 'AUD', 'NF', '574', -28.995170686948427, -29.063076742954735, 167.99773740209957, 167.91543230151365, 'Kingston', 'Oceania', 'OC', 'en-NF', 'NFK', 2155115),
('NG', 'Nigeria', 'NGN', 'NI', '566', 13.892007, 4.277144, 14.680073, 2.668432, 'Abuja', 'Africa', 'AF', 'en-NG,ha,yo,ig,ff', 'NGA', 2328926),
('NI', 'Nicaragua', 'NIO', 'NU', '558', 15.025909, 10.707543, -82.738289, -87.690308, 'Managua', 'North America', 'NA', 'es-NI,en', 'NIC', 3617476),
('NL', 'Netherlands', 'EUR', 'NL', '528', 53.512196, 50.753918, 7.227944, 3.362556, 'Amsterdam', 'Europe', 'EU', 'nl-NL,fy-NL', 'NLD', 2750405),
('NO', 'Norway', 'NOK', 'NO', '578', 71.18811, 57.977917, 31.078052520751953, 4.650167, 'Oslo', 'Europe', 'EU', 'no,nb,nn,se,fi', 'NOR', 3144096),
('NP', 'Nepal', 'NPR', 'NP', '524', 30.43339, 26.356722, 88.199333, 80.056274, 'Kathmandu', 'Asia', 'AS', 'ne,en', 'NPL', 1282988),
('NR', 'Nauru', 'AUD', 'NR', '520', -0.504306, -0.552333, 166.945282, 166.899033, '', 'Oceania', 'OC', 'na,en-NR', 'NRU', 2110425),
('NU', 'Niue', 'NZD', 'NE', '570', -18.951069, -19.152193, -169.775177, -169.951004, 'Alofi', 'Oceania', 'OC', 'niu,en-NU', 'NIU', 4036232),
('NZ', 'New Zealand', 'NZD', 'NZ', '554', -34.389668, -47.286026, -180, 166.7155, 'Wellington', 'Oceania', 'OC', 'en-NZ,mi', 'NZL', 2186224),
('OM', 'Oman', 'OMR', 'MU', '512', 26.387972, 16.64575, 59.836582, 51.882, 'Muscat', 'Asia', 'AS', 'ar-OM,en,bal,ur', 'OMN', 286963),
('PA', 'Panama', 'PAB', 'PM', '591', 9.637514, 7.197906, -77.17411, -83.051445, 'Panama City', 'North America', 'NA', 'es-PA,en', 'PAN', 3703430),
('PE', 'Peru', 'PEN', 'PE', '604', -0.012977, -18.349728, -68.677986, -81.326744, 'Lima', 'South America', 'SA', 'es-PE,qu,ay', 'PER', 3932488),
('PF', 'French Polynesia', 'XPF', 'FP', '258', -7.903573, -27.653572, -134.929825, -152.877167, 'Papeete', 'Oceania', 'OC', 'fr-PF,ty', 'PYF', 4030656),
('PG', 'Papua New Guinea', 'PGK', 'PP', '598', -1.318639, -11.657861, 155.96344, 140.842865, 'Port Moresby', 'Oceania', 'OC', 'en-PG,ho,meu,tpi', 'PNG', 2088628),
('PH', 'Philippines', 'PHP', 'RP', '608', 21.120611, 4.643306, 126.601524, 116.931557, 'Manila', 'Asia', 'AS', 'tl,en-PH,fil', 'PHL', 1694008),
('PK', 'Pakistan', 'PKR', 'PK', '586', 37.097, 23.786722, 77.840919, 60.878613, 'Islamabad', 'Asia', 'AS', 'ur-PK,en-PK,pa,sd,ps,brh', 'PAK', 1168579),
('PL', 'Poland', 'PLN', 'PL', '616', 54.839138, 49.006363, 24.150749, 14.123, 'Warsaw', 'Europe', 'EU', 'pl', 'POL', 798544),
('PM', 'Saint Pierre and Miquelon', 'EUR', 'SB', '666', 47.146286, 46.786041, -56.252991, -56.420658, 'Saint-Pierre', 'North America', 'NA', 'fr-PM', 'SPM', 3424932),
('PN', 'Pitcairn Islands', 'NZD', 'PC', '612', -24.315865, -24.672565, -124.77285, -128.346436, 'Adamstown', 'Oceania', 'OC', 'en-PN', 'PCN', 4030699),
('PR', 'Puerto Rico', 'USD', 'RQ', '630', 18.520166, 17.926405, -65.242737, -67.942726, 'San Juan', 'North America', 'NA', 'en-PR,es-PR', 'PRI', 4566966),
('PS', 'Palestine', 'ILS', 'WE', '275', 32.54638671875, 31.216541290283203, 35.5732955932617, 34.21665954589844, '', 'Asia', 'AS', 'ar-PS', 'PSE', 6254930),
('PT', 'Portugal', 'EUR', 'PO', '620', 42.154311127408, 36.96125, -6.18915930748288, -9.50052660716588, 'Lisbon', 'Europe', 'EU', 'pt-PT,mwl', 'PRT', 2264397),
('PW', 'Palau', 'USD', 'PS', '585', 8.46966, 2.8036, 134.72307, 131.11788, 'Melekeok - Palau State Capital', 'Oceania', 'OC', 'pau,sov,en-PW,tox,ja,fil,zh', 'PLW', 1559582),
('PY', 'Paraguay', 'PYG', 'PA', '600', -19.294041, -27.608738, -54.259354, -62.647076, 'Asunción', 'South America', 'SA', 'es-PY,gn', 'PRY', 3437598),
('QA', 'Qatar', 'QAR', 'QA', '634', 26.154722, 24.482944, 51.636639, 50.757221, 'Doha', 'Asia', 'AS', 'ar-QA,es', 'QAT', 289688),
('RE', 'Réunion', 'EUR', 'RE', '638', -20.868391324576944, -21.383747301469107, 55.838193901930026, 55.21219224792685, 'Saint-Denis', 'Africa', 'AF', 'fr-RE', 'REU', 935317),
('RO', 'Romania', 'RON', 'RO', '642', 48.266945, 43.627304, 29.691055, 20.269972, 'Bucharest', 'Europe', 'EU', 'ro,hu,rom', 'ROU', 798549),
('RS', 'Serbia', 'RSD', 'RI', '688', 46.18138885498047, 42.232215881347656, 23.00499725341797, 18.817020416259766, 'Belgrade', 'Europe', 'EU', 'sr,hu,bs,rom', 'SRB', 6290252),
('RU', 'Russia', 'RUB', 'RS', '643', 81.857361, 41.188862, -169.05, 19.25, 'Moscow', 'Europe', 'EU', 'ru,tt,xal,cau,ady,kv,ce,tyv,cv,udm,tut,mns,bua,myv,mdf,chm,ba,inh,tut,kbd,krc,ava,sah,nog', 'RUS', 2017370),
('RW', 'Rwanda', 'RWF', 'RW', '646', -1.053481, -2.840679, 30.895958, 28.856794, 'Kigali', 'Africa', 'AF', 'rw,en-RW,fr-RW,sw', 'RWA', 49518),
('SA', 'Saudi Arabia', 'SAR', 'SA', '682', 32.158333, 15.61425, 55.666584, 34.495693, 'Riyadh', 'Asia', 'AS', 'ar-SA', 'SAU', 102358),
('SB', 'Solomon Islands', 'SBD', 'BP', '090', -6.589611, -11.850555, 166.980865, 155.508606, 'Honiara', 'Oceania', 'OC', 'en-SB,tpi', 'SLB', 2103350),
('SC', 'Seychelles', 'SCR', 'SE', '690', -4.283717, -9.753867, 56.29770287937299, 46.204769, 'Victoria', 'Africa', 'AF', 'en-SC,fr-SC', 'SYC', 241170),
('SD', 'Sudan', 'SDG', 'SU', '729', 22.232219696044922, 8.684720993041992, 38.60749816894531, 21.827774047851562, 'Khartoum', 'Africa', 'AF', 'ar-SD,en,fia', 'SDN', 366755),
('SE', 'Sweden', 'SEK', 'SW', '752', 69.0625, 55.337112, 24.1562924839185, 11.118694, 'Stockholm', 'Europe', 'EU', 'sv-SE,se,sma,fi-SE', 'SWE', 2661886),
('SG', 'Singapore', 'SGD', 'SN', '702', 1.471278, 1.258556, 104.007469, 103.638275, 'Singapore', 'Asia', 'AS', 'cmn,en-SG,ms-SG,ta-SG,zh-SG', 'SGP', 1880251),
('SH', 'Saint Helena', 'SHP', 'SH', '654', -7.887815, -16.019543, -5.638753, -14.42123, 'Jamestown', 'Africa', 'AF', 'en-SH', 'SHN', 3370751),
('SI', 'Slovenia', 'EUR', 'SI', '705', 46.8766275518195, 45.421812998164, 16.6106311807, 13.3753342064709, 'Ljubljana', 'Europe', 'EU', 'sl,sh', 'SVN', 3190538),
('SJ', 'Svalbard and Jan Mayen', 'NOK', 'SV', '744', 80.762085, 79.220306, 33.287334, 17.699389, 'Longyearbyen', 'Europe', 'EU', 'no,ru', 'SJM', 607072),
('SK', 'Slovakia', 'EUR', 'LO', '703', 49.603168, 47.728111, 22.570444, 16.84775, 'Bratislava', 'Europe', 'EU', 'sk,hu', 'SVK', 3057568),
('SL', 'Sierra Leone', 'SLL', 'SL', '694', 10, 6.929611, -10.284238, -13.307631, 'Freetown', 'Africa', 'AF', 'en-SL,men,tem', 'SLE', 2403846),
('SM', 'San Marino', 'EUR', 'SM', '674', 43.99223730851663, 43.8937092171425, 12.51653186779788, 12.403538978820734, 'San Marino', 'Europe', 'EU', 'it-SM', 'SMR', 3168068),
('SN', 'Senegal', 'XOF', 'SG', '686', 16.691633, 12.307275, -11.355887, -17.535236, 'Dakar', 'Africa', 'AF', 'fr-SN,wo,fuc,mnk', 'SEN', 2245662),
('SO', 'Somalia', 'SOS', 'SO', '706', 11.979166, -1.674868, 51.412636, 40.986595, 'Mogadishu', 'Africa', 'AF', 'so-SO,ar-SO,it,en-SO', 'SOM', 51537),
('SR', 'Suriname', 'SRD', 'NS', '740', 6.004546, 1.831145, -53.977493, -58.086563, 'Paramaribo', 'South America', 'SA', 'nl-SR,en,srn,hns,jv', 'SUR', 3382998),
('SS', 'South Sudan', 'SSP', 'OD', '728', 12.219148635864258, 3.493394374847412, 35.9405517578125, 24.140274047851562, 'Juba', 'Africa', 'AF', 'en', 'SSD', 7909807),
('ST', 'São Tomé and Príncipe', 'STD', 'TP', '678', 1.701323, 0.024766, 7.466374, 6.47017, 'São Tomé', 'Africa', 'AF', 'pt-ST', 'STP', 2410758),
('SV', 'El Salvador', 'USD', 'ES', '222', 14.445067, 13.148679, -87.692162, -90.128662, 'San Salvador', 'North America', 'NA', 'es-SV', 'SLV', 3585968),
('SX', 'Sint Maarten', 'ANG', 'NN', '534', 18.070248, 18.011692, -63.012993, -63.144039, 'Philipsburg', 'North America', 'NA', 'nl,en', 'SXM', 7609695),
('SY', 'Syria', 'SYP', 'SY', '760', 37.319138, 32.310665, 42.385029, 35.727222, 'Damascus', 'Asia', 'AS', 'ar-SY,ku,hy,arc,fr,en', 'SYR', 163843),
('SZ', 'Eswatini', 'SZL', 'WZ', '748', -25.719648, -27.317101, 32.13726, 30.794107, 'Mbabane', 'Africa', 'AF', 'en-SZ,ss-SZ', 'SWZ', 934841),
('TC', 'Turks and Caicos Islands', 'USD', 'TK', '796', 21.961878, 21.422626, -71.123642, -72.483871, 'Cockburn Town', 'North America', 'NA', 'en-TC', 'TCA', 3576916),
('TD', 'Chad', 'XAF', 'CD', '148', 23.450369, 7.441068, 24.002661, 13.473475, 'N\'Djamena', 'Africa', 'AF', 'fr-TD,ar-TD,sre', 'TCD', 2434508),
('TF', 'French Southern Territories', 'EUR', 'FS', '260', -37.790722, -49.735184, 77.598808, 50.170258, 'Port-aux-Français', 'Antarctica', 'AN', 'fr', 'ATF', 1546748),
('TG', 'Togo', 'XOF', 'TO', '768', 11.138977, 6.104417, 1.806693, -0.147324, 'Lomé', 'Africa', 'AF', 'fr-TG,ee,hna,kbp,dag,ha', 'TGO', 2363686),
('TH', 'Thailand', 'THB', 'TH', '764', 20.463194, 5.61, 105.639389, 97.345642, 'Bangkok', 'Asia', 'AS', 'th,en', 'THA', 1605651),
('TJ', 'Tajikistan', 'TJS', 'TI', '762', 41.042252, 36.674137, 75.137222, 67.387138, 'Dushanbe', 'Asia', 'AS', 'tg,ru', 'TJK', 1220409),
('TK', 'Tokelau', 'NZD', 'TL', '772', -8.553613662719727, -9.381111145019531, -171.21142578125, -172.50033569335938, '', 'Oceania', 'OC', 'tkl,en-TK', 'TKL', 4031074),
('TL', 'East Timor', 'USD', 'TT', '626', -8.135833740234375, -9.463626861572266, 127.30859375, 124.04609680175781, 'Dili', 'Oceania', 'OC', 'tet,pt-TL,id,en', 'TLS', 1966436),
('TM', 'Turkmenistan', 'TMT', 'TX', '795', 42.795555, 35.141083, 66.684303, 52.441444, 'Ashgabat', 'Asia', 'AS', 'tk,ru,uz', 'TKM', 1218197),
('TN', 'Tunisia', 'TND', 'TS', '788', 37.543915, 30.240417, 11.598278, 7.524833, 'Tunis', 'Africa', 'AF', 'ar-TN,fr', 'TUN', 2464461),
('TO', 'Tonga', 'TOP', 'TN', '776', -15.562988, -21.455057, -173.907578, -175.682266, 'Nuku\'alofa', 'Oceania', 'OC', 'to,en-TO', 'TON', 4032283),
('TR', 'Turkey', 'TRY', 'TU', '792', 42.107613, 35.815418, 44.834999, 25.668501, 'Ankara', 'Asia', 'AS', 'tr-TR,ku,diq,az,av', 'TUR', 298795),
('TT', 'Trinidad and Tobago', 'TTD', 'TD', '780', 11.338342, 10.036105, -60.517933, -61.923771, 'Port of Spain', 'North America', 'NA', 'en-TT,hns,fr,es,zh', 'TTO', 3573591),
('TV', 'Tuvalu', 'AUD', 'TV', '798', -5.641972, -10.801169, 179.863281, 176.064865, 'Funafuti', 'Oceania', 'OC', 'tvl,en,sm,gil', 'TUV', 2110297),
('TW', 'Taiwan', 'TWD', 'TW', '158', 25.3002899036181, 21.896606934717, 122.006739823315, 119.534691, 'Taipei', 'Asia', 'AS', 'zh-TW,zh,nan,hak', 'TWN', 1668284),
('TZ', 'Tanzania', 'TZS', 'TZ', '834', -0.990736, -11.745696, 40.443222, 29.327168, 'Dodoma', 'Africa', 'AF', 'sw-TZ,en,ar', 'TZA', 149590),
('UA', 'Ukraine', 'UAH', 'UP', '804', 52.369362, 44.390415, 40.20739, 22.128889, 'Kyiv', 'Europe', 'EU', 'uk,ru-UA,rom,pl,hu', 'UKR', 690791),
('UG', 'Uganda', 'UGX', 'UG', '800', 4.214427, -1.48405, 35.036049, 29.573252, 'Kampala', 'Africa', 'AF', 'en-UG,lg,sw,ar', 'UGA', 226074),
('UM', 'U.S. Minor Outlying Islands', 'USD', '', '581', 28.219814, -0.389006, 166.654526, -177.392029, '', 'Oceania', 'OC', 'en-UM', 'UMI', 5854968),
('US', 'United States', 'USD', 'US', '840', 49.388611, 24.544245, -66.954811, -124.733253, 'Washington', 'North America', 'NA', 'en-US,es-US,haw,fr', 'USA', 6252001),
('UY', 'Uruguay', 'UYU', 'UY', '858', -30.082224, -34.980816, -53.073933, -58.442722, 'Montevideo', 'South America', 'SA', 'es-UY', 'URY', 3439705),
('UZ', 'Uzbekistan', 'UZS', 'UZ', '860', 45.575001, 37.184444, 73.132278, 55.996639, 'Tashkent', 'Asia', 'AS', 'uz,ru,tg', 'UZB', 1512440),
('VA', 'Vatican City', 'EUR', 'VT', '336', 41.90743830885576, 41.90027960306854, 12.45837546629481, 12.44570678169205, 'Vatican', 'Europe', 'EU', 'la,it,fr', 'VAT', 3164670),
('VC', 'Saint Vincent and the Grenadines', 'XCD', 'VC', '670', 13.377834, 12.583984810969037, -61.11388, -61.46090317727658, 'Kingstown', 'North America', 'NA', 'en-VC,fr', 'VCT', 3577815),
('VE', 'Venezuela', 'VEF', 'VE', '862', 12.201903, 0.626311, -59.80378, -73.354073, 'Caracas', 'South America', 'SA', 'es-VE', 'VEN', 3625428),
('VG', 'British Virgin Islands', 'USD', 'VI', '092', 18.757221, 18.383710898211305, -64.268768, -64.71312752730364, 'Road Town', 'North America', 'NA', 'en-VG', 'VGB', 3577718),
('VI', 'U.S. Virgin Islands', 'USD', 'VQ', '850', 18.415382, 17.673931, -64.565193, -65.101333, 'Charlotte Amalie', 'North America', 'NA', 'en-VI', 'VIR', 4796775),
('VN', 'Vietnam', 'VND', 'VM', '704', 23.388834, 8.559611, 109.464638, 102.148224, 'Hanoi', 'Asia', 'AS', 'vi,en,fr,zh,km', 'VNM', 1562822),
('VU', 'Vanuatu', 'VUV', 'NH', '548', -13.073444, -20.248945, 169.904785, 166.524979, 'Port Vila', 'Oceania', 'OC', 'bi,en-VU,fr-VU', 'VUT', 2134431),
('WF', 'Wallis and Futuna', 'XPF', 'WF', '876', -13.216758181061444, -14.314559989820843, -176.16174317718253, -178.1848112896414, 'Mata-Utu', 'Oceania', 'OC', 'wls,fud,fr-WF', 'WLF', 4034749),
('WS', 'Samoa', 'WST', 'WS', '882', -13.432207, -14.040939, -171.415741, -172.798599, 'Apia', 'Oceania', 'OC', 'sm,en-WS', 'WSM', 4034894),
('XK', 'Kosovo', 'EUR', 'KV', '0', 43.2682495807952, 41.856369601859925, 21.80335088694943, 19.977481504492914, 'Pristina', 'Europe', 'EU', 'sq,sr', 'XKX', 831053),
('YE', 'Yemen', 'YER', 'YM', '887', 18.9999989031009, 12.1110910264462, 54.5305388163283, 42.5325394314234, 'Sanaa', 'Asia', 'AS', 'ar-YE', 'YEM', 69543),
('YT', 'Mayotte', 'EUR', 'MF', '175', -12.648891, -13.000132, 45.29295, 45.03796, 'Mamoutzou', 'Africa', 'AF', 'fr-YT', 'MYT', 1024031),
('ZA', 'South Africa', 'ZAR', 'SF', '710', -22.126612, -34.839828, 32.895973, 16.458021, 'Pretoria', 'Africa', 'AF', 'zu,xh,af,nso,en-ZA,tn,st,ts,ss,ve,nr', 'ZAF', 953987),
('ZM', 'Zambia', 'ZMW', 'ZA', '894', -8.22436, -18.079473, 33.705704, 21.999371, 'Lusaka', 'Africa', 'AF', 'en-ZM,bem,loz,lun,lue,ny,toi', 'ZMB', 895949),
('ZW', 'Zimbabwe', 'ZWL', 'ZI', '716', -15.608835, -22.417738, 33.056305, 25.237028, 'Harare', 'Africa', 'AF', 'en-ZW,sn,nr,nd', 'ZWE', 878675);


UPDATE countries 
SET created_at=NOW() ,updated_at=NOW(),created_by=1;

UPDATE countries 
SET deleted_at=NOW() WHERE id NOT IN (130,155);