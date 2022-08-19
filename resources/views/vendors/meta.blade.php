<base href="{{ URL::to("/") }}" />
<meta charset="{{ env("APP_CHARSET") }}" />

<meta http-equiv="refresh" content="3600" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Content-Language" content="{{ env("APP_LANGUAGE") }}" />
<meta http-equiv="Content-Script-Type" content="text/javascript" />
<meta http-equiv="Content-Style-Type" content="text/css" />
<meta http-equiv="Pragma" content="no-cache" />
<meta http-equiv="Expires" content="never" />
<meta http-equiv="Cache-Control" content="no-cache" />
<meta http-equiv="imagetoolbar" content="no" />
<meta http-equiv="X-UA-Compatible" content="IE=8, IE=9, IE=10, IE=edge, chrome=1" />
<meta http-equiv="CHARSET" content="UTF-8" />
<meta http-equiv="VW96.OBJECT TYPE" content="Document" />
<meta http-equiv="x-dns-prefetch-control" content="off" />
<meta http-equiv="Window-Target" content="_top" />

<meta name="viewport" content="width=device-width, height=device-height, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, shrink-to-fit=no" />
<meta name="format-detection" content="telephone=no" />
<meta name="theme-color" content="#{{ env("APP_COLOR") }}" />
<meta name="csrf-token" content="{{ csrf_token() }}">

<meta name="apple-mobile-web-app-title" content="{{ env("APP_NAME") }}" />
<meta name="apple-mobile-web-app-capable" content="YES" />
<meta name="apple-mobile-web-app-status-bar-style" content="#{{ env("APP_COLOR") }}" />
<meta name="apple-itunes-app" content="app-id={{ env("APPLE_ITUNES_APP") }}" />

<meta name="application-name" content="{{ env("APP_NAME") }}" />
<meta name="msapplication-window" content="width=device-width;height=device-height" />
<meta name="msapplication-task" content="name={{ env("APP_NAME") }}; action-uri={{ URL::to("/") }}; icon-uri={{ URL::to("/") }}/images/tile/tile.png" />
<meta name="msapplication-square70x70logo" content="{{ URL::to("/") }}/images/tile/tile-small.png" />
<meta name="msapplication-square150x150logo" content="{{ URL::to("/") }}/images/tile/tile-medium.png" />
<meta name="msapplication-wide310x150logo" content="{{ URL::to("/") }}/images/tile/tile-wide.png" />
<meta name="msapplication-square310x310logo" content="{{ URL::to("/") }}/images/tile/tile-large.png" />
<meta name="msapplication-config" content="{{ URL::to("/") }}/tile.xml" />
<meta name="msapplication-TileImage" content="{{ URL::to("/") }}/images/tile/tile.png" />
<meta name="msapplication-TileColor" content="#{{ env("APP_COLOR") }}" />
<meta name="msapplication-navbutton-color" content="#{{ env("APP_COLOR") }}" />
<meta name="msApplication-PackageFamilyName" content="{{ env("APP_NAME") }}" />
<meta name="msApplication-ID" content="App" />

<meta name="if:Sliding header" content="1" />
<meta name="if:Show navigation" content="1" />
<meta name="if:Endless scrolling" content="1" />
<meta name="if:Syntax highlighting" content="1" />

<meta name="select:Layout" content="regular" title="Regular" />
<meta name="select:Layout" content="narrow" title="Narrow" />
<meta name="select:Layout" content="grid" title="Grid" />

<meta name="if:Related Posts" content="1" />
<meta name="text:Disqus shortname" content="{{ env("APP_NAME") }}" />
<meta name="text:Google analytics ID" content="{{ env("GOOGLE_ANALYTICS") }}" />
<meta name="name" content="{{ env("APP_NAME") }}" />
<meta name="title" content="{{ env("APP_NAME") }}" />
<meta name="description" content="{{ env("APP_DESCRIPTION") }}" />
<meta name="subject" content="{{ env("APP_NAME") }}" />
<meta name="abstract" content="{{ env("APP_NAME") }}" />
<meta name="keywords" content="{{ env("APP_KEYWORD") }}" />
<meta name="designer" content="{{ env("APP_NAME") }}" />
<meta name="creator" content="{{ env("APP_NAME") }}" />
<meta name="publisher" content="{{ env("APP_NAME") }}" />
<meta name="author" content="{{ env("APP_NAME") }}" />
<meta name="rights" content="{{ env("APP_NAME") }}" />
<meta name="referrer" content="origin-when-crossorigin" />
<meta name="aesop" content="Information" />
<meta name="target" content="global" />
<meta name="revisit" content="2 days" />
<meta name="revisit-after" content="7" />
<meta name="webcrawlers" content="all" />
<meta name="rating" content="all" />
<meta name="spiders" content="all" />
<meta name="robots" content="all" />
<meta name="audience" content="all" />
<meta name="copyright" content="Copyright @if(env("APP_YEAR")){{ env("APP_YEAR") }} -@endif{{ date("Y") }} {{ env("APP_NAME") }}. All Rights Reserved." />
<meta name="formatter" content="{{ env("APP_NAME") }}" />
<meta name="generator" content="Laravel" />

<meta name="msvalidate.01" content="{{ env("MSVALIDATE_01") }}" />
<meta name="google-site-verification" content="{{ env("GOOGLE_SITE_VERIFICATION") }}" />
<meta name="norton-safeweb-site-verification" content="{{ env("NORTON_SAFEWEB_SITE_VERIFICATION") }}" />
<meta name="W3Techs-verification" content="{{ env("W3TECHS_VERIFICATION") }}" />
<meta name="wot-verification" content="{{ env("WOT_VERIFICATION") }}" >

<meta name="p:domain_verify" content="{{ env("P_DOMAIN_VERIFY") }}" />
<meta name="alexaVerifyID" content="{{ env("ALEXAVERIFYID") }}" />
<meta name="yandex-verification" content="{{ env("YANDEX_VERIFICATION") }}" />
<meta name="majestic-site-verification" content="{{ env("MAJESTIC_SITE_VERIFICATION") }}" />
<meta name="baidu-site-verification" content="{{ env("BAIDU_SITE_VERIFICATION") }}" />

<meta name="DC.Title" content="{{ env("APP_NAME") }}" />
<meta name="DC.Title.Alternative" content="{{ env("APP_NAME") }}" />
<meta name="DC.Subject" content="{{ env("APP_TITLE") }}" />
<meta name="DC.Creator" content="{{ env("APP_CREATOR") }}" />
<meta name="DC.Creator.PersonalName" content="{{ env("APP_CREATOR") }}" />
<meta name="DC.Publisher" content="{{ env("APP_NAME") }}" />
<meta name="DC.Source" content="ISBN 88-07-80416-6" />
<meta name="DC.Type" content="Text" scheme="DCTERMS.DCMIType" />
<meta name="DC.Date" content="{{ date("Y-m-d") }}" />
<meta name="DC.Format" content="text/html" />
<meta name="DC.Language" content="{{ env("APP_LANGUAGE") }}" scheme="ISO639" />
<meta name="DC.Relation" content="{{ URL::to("/") }}" scheme="URL" />
<meta name="DC.Identifier" content="{{ URL::to("/") }}" scheme="DCTERMS.URI" />
<meta name="DC.Coverage" content="{{ env("APP_COUNTRY") }}" />
<meta name="DC.Rights" content="Copyright @if(env("APP_YEAR")){{ env("APP_YEAR") }} -@endif{{ date("Y") }} {{ env("APP_NAME") }}. All Rights Reserved." />

<meta name="geo.region" content="{{ env("GEO_REGION") }}" />
<meta name="geo.placename" content="{{ env("GEO_PLACENAME") }}" />
<meta name="geo.country" content="{{ env("GEO_COUNTRY") }}" />
<meta name="geo.position" content="{{ env("GEO_POSITION") }}" />
<meta name="Distribution" content="{{ env("GEO_POSITION") }}" />
<meta name="ICBM" content="{{ env("GEO_POSITION") }}" />

<meta name="twitter:title" content="{{ env("TWITTER_TITLE") }}" />
<meta name="twitter:description" content="{{ env("TWITTER_DESCRIPTION") }}" />
<meta name="twitter:card" content="{{ env("TWITTER_CARD") }}" />
<meta name="twitter:site" content="{{ env("TWITTER_SITE") }}" />
<meta name="twitter:creator" content="{{ env("TWITTER_CREATOR") }}" />
<meta name="twitter:url" content="{{ env("TWITTER_URL") }}" />
<meta name="twitter:image" content="{{ env("TWITTER_IMAGE") }}" />
<meta name="twitter:image:src" content="{{ env("TWITTER_IMAGE_SRC") }}" />
<meta name="twitter:account_id" content="{{ env("TWITTER_APP_ID_IPAD") }}" />
<meta name="twitter:app:id:ipad" content="{{ env("TWITTER_APP_ID_IPHONE") }}" />
<meta name="twitter:app:id:iphone" content="{{ env("TWITTER_IMAGE") }}" />
<meta name="twitter:app:name:ipad" content="{{ env("TWITTER_APP_NAME_IPAD") }}" />
<meta name="twitter:app:name:iphone" content="{{ env("TWITTER_APP_NAME_IPHONE") }}" />

<meta name="Google" content="{{ env("APP_NAME") }}" />
<meta name="Googlebot" content="index, follow, all" />
<meta name="Googlebot-News" content="index, follow, all" />
<meta name="Googlebot-Image" content="index, follow, all" />
<meta name="Googlebot-Video" content="index, follow, all" />
<meta name="Googlebot-Mobile" content="index, follow, all" />
<meta name="Mediapartners-Google" content="index, follow, all" />
<meta name="Adsbot-Google" content="index, follow, all" />
<meta name="robots" content="index, follow, all" />
<meta name="SPIDERS" content="index, follow, all" />
<meta name="WEBCRAWLERS" content="index, follow, all" />
<meta name="scooter" content="index, follow, all" />
<meta name="msnbot" content="index, follow, all" />
<meta name="teoma" content="index, follow, all" />
<meta name="alexabot" content="index, follow, all" />
<meta name="slurp" content="index, follow, all" />
<meta name="zyBorg" content="index, follow, all" />
<meta name="robots" content="googlebot" />
<meta name="robots" content="Googlebot-Image" />
<meta name="robots" content="Scooter" />
<meta name="robots" content="msnbot" />
<meta name="robots" content="alexabot" />
<meta name="robots" content="Slurp" />
<meta name="robots" content="ZyBorg" />
<meta name="robots" content="SPIDERS" />
<meta name="robots" content="WEBCRAWLERS" />
<meta name="robots" content="noodp" />
<meta name="robots" content="noydir" />
<meta name="Google" content="index, follow, all" />
<meta name="Yahoo" content="index, follow, all" />
<meta name="Bing" content="index, follow, all" />
<meta name="Ask" content="index, follow, all" />
<meta name="Baidu" content="index, follow, all" />
<meta name="Yandex" content="index, follow, all" />
<meta name="search engines" content="aeiwi, alexa, alltheWeb, altavista, aol netfind, anzwers, canada, directhit, euroseek, excite, overture, go, google, hotbot. infomak, kanoodle, lycos, mastersite, national directory, northern light, searchit, simplesearch, Websmostlinked, webtop, what-u-seek, aol, yahoo, webcrawler, infoseek, excite, magellan, looksmart, bing, cnet, googlebot" />
<meta name="MSSmartTagsPreventParsing true" content="TRUE" />
<meta name="rating" content="general" />
<meta name="HandheldFriendly" content="True" />

<meta itemprop="name" content="{{ env("APP_NAME") }}" />
<meta itemprop="description" content="{{ env("APP_DESCRIPTION") }}" />
<meta itemprop="image" content="{{ URL::to("/") }}/images/banner.png" />
<meta itemprop="thumbnailUrl" content="{{ URL::to("/") }}/images/banner.png"/>
<meta itemprop="author" content="{{ env("APP_NAME") }}"/>
<meta itemprop="datePublished" content="{{ \Carbon\Carbon::now() }}"/>
<meta itemprop="headline" content="{{ env("APP_TITLE") }}"/>
<meta itemprop="publisher" content="{{ env("APP_CREATOR") }}"/>

<meta property="fb:pages" content="{{ env("FACEBOOK_PAGE") }}" />
<meta property="fb:app_id" content="{{ env("FACEBOOK_APP_ID") }}" />
<meta property="fb:page_id" content="{{ env("FACEBOOK_PAGE_ID") }}" />
<meta property="fb:admins" content="{{ env("FACEBOOK_ADMINS") }}" />

<meta property="article:publisher" content="{{ env("ARTICLE_PUBLISHER") }}" />
<meta property="article:author" content="{{ env("ARTICLE_AUTHOR") }}" />

<meta property="og:type" content="{{ env("OG_TYPE") }}" />
<meta property="og:url" content="{{ env("OG_URL") }}" />
<meta property="og:title" content="{{ env("OG_TITLE") }}" />
<meta property="og:site_name" content="{{ env("OG_SITE_NAME") }}" />
<meta property="og:description" content="{{ env("OG_DESCRIPTION") }}" />
<meta property="og:image" content="{{ env("OG_IMAGE") }}" />
<meta property="og:locale" content="{{ env("OG_LOCALE") }}" />
<meta property="og:locale:alternate" content="{{ env("OG_LOCALE_ALTERNATE") }}" />
<meta property="og:latitude" content="{{ env("OG_LATITUDE") }}"/>
<meta property="og:longitude" content="{{ env("OG_LONGITUDE") }}"/>
<meta property="og:image:width" content="{{ env("OG_IMAGE_WIDTH") }}"/>
<meta property="og:image:height" content="{{ env("OG_IMAGE_HEIGHT") }}"/>

<link rel="me" href="{{ env("APP_CREATOR") }}" />
<link rel="profile" href="{{ env("APP_CREATOR") }}" />
<link rel="author" href="{{ env("APP_CREATOR") }}" />
<link rel="publisher" href="{{ env("APP_CREATOR") }}" />
<link rel="manifest" href="{{ URL::to("/") }}/manifest.json" />
<link rel="apple-touch-icon-precomposed" href="{{ URL::to("/") }}/images/favicon.png" />
<link rel="apple-touch-icon" href="{{ URL::to("/") }}/images/apple/apple-touch-icon-76x76.png" sizes="76x76" />
<link rel="shortcut icon" href="{{ URL::to("/") }}/images/favicon.png" type="image/x-icon" />
<link rel="shortlink" href="{{ URL::to("/") }}" />
<link rel="openid.server" href="{{ URL::to("/") }}" />
<link rel="openid.delegate" href="{{ URL::to("/") }}" />
<link rel="image_src" href="{{ URL::to("/") }}/images/banner.png" />

<link rel="alternate" href="{{ URL::to("/") }}" hreflang="x-default" />
<link rel="alternate" href="{{ URL::to("/") }}" media="handheld" />
<link rel="alternate" href="{{ URL::to("/") }}" media="only screen and (max-width: 640px)" />
<link rel="alternate" href="{{ URL::to("/") }}" hreflang="En-Us" />
<link rel="alternate" href="{{ URL::to("/") }}" hreflang="Id-ID" />

<link rel="preconnect" href="//s1.wp.com" crossorigin="anonymous" />
<link rel="preconnect" href="//fonts.googleapis.com" crossorigin="anonymous" />
<link rel="preconnect" href="//fonts.gstatic.com" crossorigin="anonymous" />
<link rel="preconnect" href="//stats.wp.com" crossorigin="anonymous" />
<link rel="preconnect" href="//pixel.wp.com" crossorigin="anonymous" />
<link rel="preconnect" href="//ssl.google-analytics.com" crossorigin="anonymous" />

<link rel="dns-prefetch" href="//apis.google.com" />
<link rel="dns-prefetch" href="//cdnjs.cloudflare.com" />
<link rel="dns-prefetch" href="//fonts.googleapis.com" />
<link rel="dns-prefetch" href="//fonts.gstatic.com" />
<link rel="dns-prefetch" href="//pixel.wp.com" />
<link rel="dns-prefetch" href="//s.w.org" />
<link rel="dns-prefetch" href="//stats.wp.com" />
<link rel="dns-prefetch" href="//ssl.google-analytics.com" />
<link rel="dns-prefetch" href="//www.static-src.com" />
<link rel="dns-prefetch" href="//s1.static-src.com" />
<link rel="dns-prefetch" href="//s2.static-src.com" />
<link rel="dns-prefetch" href="//s3.static-src.com" />
<link rel="dns-prefetch" href="//connect.facebook.net" />
<link rel="dns-prefetch" href="//www.google-analytics.com" />
<link rel="dns-prefetch" href="//www.googletagmanager.com" />
<link rel="dns-prefetch" href="//www.googleadservices.com" />
