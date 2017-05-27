<?php


namespace AppBundle\Twig;

class AppExtension extends  \Twig_Extension
{
	public function getFilters()
	{
		return [
//			new \Twig_SimpleFilter('md2html', [$this, 'markdownToHtml'], ['is_safe' => ['html']]),
			new \Twig_SimpleFilter('static', array($this, 'staticAccess')),
		];
	}

	public function getFunctions()
	{
		return [
//			new \Twig_SimpleFunction('locales', [$this, 'getLocales']),
		];
	}

	public function getName()
	{
		// the name of the Twig extension must be unique in the application. Consider
		// using 'app.extension' if you only have one Twig extension in your application.
		return 'app.extension';
	}

	/**
	 * Access static class member in twig template
	 * @param $class
	 * @param $property
	 */
	public function staticAccess($class, $property)
	{
		return (property_exists($class, $property)) ? $class::$$property : null;
	}

}