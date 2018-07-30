<?php

/* frontEnd/editmMailAlert.html.twig */
class __TwigTemplate_91bc31ee7c7e55318f01835482ab164ecd38baecb1b0ed1d5888dc522a6651b3 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("base.html.twig", "frontEnd/editmMailAlert.html.twig", 1);
        $this->blocks = array(
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_4a31124d102d6ea14d75509db34e164e6e8217b8d198dca00101c60cd57f2017 = $this->env->getExtension("native_profiler");
        $__internal_4a31124d102d6ea14d75509db34e164e6e8217b8d198dca00101c60cd57f2017->enter($__internal_4a31124d102d6ea14d75509db34e164e6e8217b8d198dca00101c60cd57f2017_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "frontEnd/editmMailAlert.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_4a31124d102d6ea14d75509db34e164e6e8217b8d198dca00101c60cd57f2017->leave($__internal_4a31124d102d6ea14d75509db34e164e6e8217b8d198dca00101c60cd57f2017_prof);

    }

    // line 2
    public function block_body($context, array $blocks = array())
    {
        $__internal_6a9ab4690e9cc5a452aef1b7b59f3d7739ce6c98f50a8e821692f44bd2b3e124 = $this->env->getExtension("native_profiler");
        $__internal_6a9ab4690e9cc5a452aef1b7b59f3d7739ce6c98f50a8e821692f44bd2b3e124->enter($__internal_6a9ab4690e9cc5a452aef1b7b59f3d7739ce6c98f50a8e821692f44bd2b3e124_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 3
        echo "    ";
        $this->loadTemplate("frontEnd/partials/standard/from.html.twig", "frontEnd/editmMailAlert.html.twig", 3)->display($context);
        
        $__internal_6a9ab4690e9cc5a452aef1b7b59f3d7739ce6c98f50a8e821692f44bd2b3e124->leave($__internal_6a9ab4690e9cc5a452aef1b7b59f3d7739ce6c98f50a8e821692f44bd2b3e124_prof);

    }

    public function getTemplateName()
    {
        return "frontEnd/editmMailAlert.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  40 => 3,  34 => 2,  11 => 1,);
    }
}
/* {% extends 'base.html.twig' %}*/
/* {% block body %}*/
/*     {% include 'frontEnd/partials/standard/from.html.twig' %}*/
/* {% endblock %}*/
/* */
/* */
