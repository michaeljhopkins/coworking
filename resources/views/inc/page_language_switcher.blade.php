<ul class="nav nav-pills">
    @foreach($page->allTranslations() as $key => $translation)
    	<?php
    		$lang = \Dick\TranslationManager\Models\Language::findByAbbr($translation->translation_lang);
    	 ?>
        <li role="presentation"
			@if(App::getLocale() == $lang->abbr)
				class="active"
			@endif
        >
            <a rel="alternate" hreflang="{{$lang->abbr}}" href="{{ url($lang->abbr.'/'.$translation->slug) }}">
                {{{ $lang->native }}}
            </a>
        </li>
    @endforeach
</ul>