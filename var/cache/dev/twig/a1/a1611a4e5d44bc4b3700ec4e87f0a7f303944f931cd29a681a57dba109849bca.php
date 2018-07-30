<?php

/* frontEnd/editsystem.html.twig */
class __TwigTemplate_d701f4d23e72127114de6539bb58e065c9467b443b7d81721cac24eb3f03e38d extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("base.html.twig", "frontEnd/editsystem.html.twig", 1);
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
        $__internal_d70744016502e968def452b0c17ac089c98cf807ef866ea825e90f231a77de6e = $this->env->getExtension("native_profiler");
        $__internal_d70744016502e968def452b0c17ac089c98cf807ef866ea825e90f231a77de6e->enter($__internal_d70744016502e968def452b0c17ac089c98cf807ef866ea825e90f231a77de6e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "frontEnd/editsystem.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_d70744016502e968def452b0c17ac089c98cf807ef866ea825e90f231a77de6e->leave($__internal_d70744016502e968def452b0c17ac089c98cf807ef866ea825e90f231a77de6e_prof);

    }

    // line 2
    public function block_body($context, array $blocks = array())
    {
        $__internal_ae1245c6a859f89561aa56df80d52d4442d8874d8ff7a3bd2bccb09015c1f174 = $this->env->getExtension("native_profiler");
        $__internal_ae1245c6a859f89561aa56df80d52d4442d8874d8ff7a3bd2bccb09015c1f174->enter($__internal_ae1245c6a859f89561aa56df80d52d4442d8874d8ff7a3bd2bccb09015c1f174_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 3
        echo "    ";
        $this->loadTemplate("frontEnd/partials/standard/from.html.twig", "frontEnd/editsystem.html.twig", 3)->display($context);
        
        $__internal_ae1245c6a859f89561aa56df80d52d4442d8874d8ff7a3bd2bccb09015c1f174->leave($__internal_ae1245c6a859f89561aa56df80d52d4442d8874d8ff7a3bd2bccb09015c1f174_prof);

    }

    public function getTemplateName()
    {
        return "frontEnd/editsystem.html.twig";
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
