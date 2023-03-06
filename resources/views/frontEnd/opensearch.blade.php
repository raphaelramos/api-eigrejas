<OpenSearchDescription xmlns="https://a9.com/-/spec/opensearch/1.1/">
<ShortName>{{ Helper::GeneralSiteSettings("site_title_" . @Helper::currentLanguage()->code) }}</ShortName>
<Description>Pesquisar no site da {{ Helper::GeneralSiteSettings("site_title_" . @Helper::currentLanguage()->code) }}</Description>
<InputEncoding>UTF-8</InputEncoding>
<LongName>Pesquisa {{ Helper::GeneralSiteSettings("site_title_" . @Helper::currentLanguage()->code) }}</LongName>
<Image height="32" width="32" type="image/x-icon">{{ global_asset('uploads/settings/nofav.png') }}</Image>
<Url type="text/html" method="get" template="{{ url('')  }}/search?q={searchTerms}"/>
</OpenSearchDescription>