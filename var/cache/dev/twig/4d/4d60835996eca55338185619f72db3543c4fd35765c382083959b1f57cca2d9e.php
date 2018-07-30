<?php

/* @Twig/Exception/exception_full.html.twig */
class __TwigTemplate_ceaf20b56660d184168663c22ccf8b8264695fde403001ec3956ca8fd2779b89 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("@Twig/layout.html.twig", "@Twig/Exception/exception_full.html.twig", 1);
        $this->blocks = array(
            'head' => array($this, 'block_head'),
            'title' => array($this, 'block_title'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "@Twig/layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_2ff4bd4e2ba209c1304db6af19cdd194409c4ceb99cc92283287029cc5325ba5 = $this->env->getExtension("native_profiler");
        $__internal_2ff4bd4e2ba209c1304db6af19cdd194409c4ceb99cc92283287029cc5325ba5->enter($__internal_2ff4bd4e2ba209c1304db6af19cdd194409c4ceb99cc92283287029cc5325ba5_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Twig/Exception/exception_full.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_2ff4bd4e2ba209c1304db6af19cdd194409c4ceb99cc92283287029cc5325ba5->leave($__internal_2ff4bd4e2ba209c1304db6af19cdd194409c4ceb99cc92283287029cc5325ba5_prof);

    }

    // line 3
    public function block_head($context, array $blocks = array())
    {
        $__internal_37280ada07135c5855e99183c936bae05b41ddaf55effb425074ed5e05cf2daa = $this->env->getExtension("native_profiler");
        $__internal_37280ada07135c5855e99183c936bae05b41ddaf55effb425074ed5e05cf2daa->enter($__internal_37280ada07135c5855e99183c936bae05b41ddaf55effb425074ed5e05cf2daa_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "head"));

        // line 4
        echo "    <link href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('request')->generateAbsoluteUrl($this->env->getExtension('asset')->getAssetUrl("bundles/framework/css/exception.css")), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\" media=\"all\" />
";
        
        $__internal_37280ada07135c5855e99183c936bae05b41ddaf55effb425074ed5e05cf2daa->leave($__internal_37280ada07135c5855e99183c936bae05b41ddaf55effb425074ed5e05cf2daa_prof);

    }

    // line 7
    public function block_title($context, array $blocks = array())
    {
        $__internal_518e07179eb077da5d83dda929b9e60cfcfc8912bd20f441edbf7077f29081f7 = $this->env->getExtension("native_profiler");
        $__internal_518e07179eb077da5d83dda929b9e60cfcfc8912bd20f441edbf7077f29081f7->enter($__internal_518e07179eb077da5d83dda929b9e60cfcfc8912bd20f441edbf7077f29081f7_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        // line 8
        echo "    ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["exception"]) ? $context["exception"] : $this->getContext($context, "exception")), "message", array()), "html", null, true);
        echo " (";
        echo twig_escape_filter($this->env, (isset($context["status_code"]) ? $context["status_code"] : $this->getContext($context, "status_code")), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, (isset($context["status_text"]) ? $context["status_text"] : $this->getContext($context, "status_text")), "html", null, true);
        echo ")
";
        
        $__internal_518e07179eb077da5d83dda929b9e60cfcfc8912bd20f441edbf7077f29081f7->leave($__internal_518e07179eb077da5d83dda929b9e60cfcfc8912bd20f441edbf7077f29081f7_prof);

    }

    // line 11
    public function block_body($context, array $blocks = array())
    {
        $__internal_6c7fe69300d3316acdd21e4a9c97412effaa08c03a4564c568b0cbaabda9c465 = $this->env->getExtension("native_profiler");
        $__internal_6c7fe69300d3316acdd21e4a9c97412effaa08c03a4564c568b0cbaabda9c465->enter($__internal_6c7fe69300d3316acdd21e4a9c97412effaa08c03a4564c568b0cbaabda9c465_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 12
        echo "    ";
        $this->loadTemplate("@Twig/Exception/exception.html.twig", "@Twig/Exception/exception_full.html.twig", 12)->display($context);
        
        $__internal_6c7fe69300d3316acdd21e4a9c97412effaa08c03a4564c568b0cbaabda9c465->leave($__internal_6c7fe69300d3316acdd21e4a9c97412effaa08c03a4564c568b0cbaabda9c465_prof);

    }

    public function getTemplateName()
    {
        return "@Twig/Exception/exception_full.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  78 => 12,  72 => 11,  58 => 8,  52 => 7,  42 => 4,  36 => 3,  11 => 1,);
    }
}
/* {% extends '@Twig/layout.html.twig' %}*/
/* */
/* {% block head %}*/
/*     <link href="{{ absolute_url(asset('bundles/framework/css/exception.css')) }}" rel="stylesheet" type="text/css" media="all" />*/
/* {% endblock %}*/
/* */
/* {% block title %}*/
/*     {{ exception.message }} ({{ status_code }} {{ status_text }})*/
/* {% endblock %}*/
/* */
/* {% block body %}*/
/*     {% include '@Twig/Exception/exception.html.twig' %}*/
/* {% endblock %}*/
/* */
