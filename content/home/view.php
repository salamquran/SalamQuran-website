<?php
namespace content\home;

class view
{
	public static function config()
	{
		$title = T_('Quran');
		$desc  = T_("Say hello to Quran!"). ' '. T_("Quran is calling you.");

		if(\dash\data::suraDetail())
		{
			$title = T_('Surah'). ' '. T_(\dash\data::suraDetail_tname());
			// add surah name
			$desc  = T_('Quran'). ' #'. \dash\utility\human::fitNumber(\dash\data::suraDetail_index()). ' '. T_('surah');
			// add total ayah number
			$desc  .= ' | '. \dash\utility\human::fitNumber(\dash\data::suraDetail_ayas()). ' '. T_('ayah');
			// add type
			$desc  .= ' | '. T_(\dash\data::suraDetail_type());
			// add juz
			if(\dash\data::suraDetail_alljuz())
			{
				$desc  .= ' | '. T_('juz'). \dash\utility\human::fitNumber(\dash\data::suraDetail_ayas());
			}

			// add translated name
			$desc  .= ' | '. T_(\dash\data::suraDetail_ename());
			// add arabic name
			$desc  .= ' | '. \dash\data::suraDetail_name();
		}


		\dash\data::page_title($title);
		\dash\data::page_desc($desc);
		if(\dash\url::module() === null)
		{
			\dash\data::page_special(true);
		}


		if(\dash\data::sureLoaded())
		{
			$translation_list = \lib\app\translate::translate_site_list();

			\dash\data::translationList($translation_list);
		}

		$list = \lib\app\qari::site_list();
		\dash\data::qariList($list);

		$qariLoaded = \lib\app\qari::load(\dash\request::get('qari'));
		\dash\data::qariLoaded($qariLoaded);

		$readMode = \lib\app\read_mode::site_list();
		\dash\data::readModeList($readMode);

		$readModeLoaded = \lib\app\read_mode::load(\dash\request::get('mode'));
		\dash\data::readModeLoaded($readModeLoaded);

		$fontStyle = \lib\app\font_style::site_list();
		\dash\data::fontStyleList($fontStyle);

		$fontStyleLoaded = \lib\app\font_style::load(\dash\request::get('font'));
		\dash\data::fontStyleLoaded($fontStyleLoaded);

	}
}
?>