<?php

/* frontEnd/list.html.twig */
class __TwigTemplate_cf41823522f8ef32be028f7097840002c36f9081511836e6fb965cc94ebcc222 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("base.html.twig", "frontEnd/list.html.twig", 1);
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
        $__internal_b7d8bc8b2644c836d9336dfa6f3a797d18ca7eb5fc4e8667c8fe968b82ad723d = $this->env->getExtension("native_profiler");
        $__internal_b7d8bc8b2644c836d9336dfa6f3a797d18ca7eb5fc4e8667c8fe968b82ad723d->enter($__internal_b7d8bc8b2644c836d9336dfa6f3a797d18ca7eb5fc4e8667c8fe968b82ad723d_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "frontEnd/list.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_b7d8bc8b2644c836d9336dfa6f3a797d18ca7eb5fc4e8667c8fe968b82ad723d->leave($__internal_b7d8bc8b2644c836d9336dfa6f3a797d18ca7eb5fc4e8667c8fe968b82ad723d_prof);

    }

    // line 2
    public function block_body($context, array $blocks = array())
    {
        $__internal_dde9dfc99147f94c0a5df1ccaa1789235971eda77fce3a55fa3b76757c6be45d = $this->env->getExtension("native_profiler");
        $__internal_dde9dfc99147f94c0a5df1ccaa1789235971eda77fce3a55fa3b76757c6be45d->enter($__internal_dde9dfc99147f94c0a5df1ccaa1789235971eda77fce3a55fa3b76757c6be45d_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 3
        echo "    ";
        $this->loadTemplate("frontEnd/partials/pages/list/filter.html.twig", "frontEnd/list.html.twig", 3)->display($context);
        // line 4
        echo "<hr>
    ";
        // line 5
        $this->loadTemplate("frontEnd/partials/genericList/paging.html.twig", "frontEnd/list.html.twig", 5)->display($context);
        // line 6
        echo "    ";
        $this->loadTemplate("frontEnd/partials/genericList/listTable.html.twig", "frontEnd/list.html.twig", 6)->display($context);
        
        $__internal_dde9dfc99147f94c0a5df1ccaa1789235971eda77fce3a55fa3b76757c6be45d->leave($__internal_dde9dfc99147f94c0a5df1ccaa1789235971eda77fce3a55fa3b76757c6be45d_prof);

    }

    public function getTemplateName()
    {
        return "frontEnd/list.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  48 => 6,  46 => 5,  43 => 4,  40 => 3,  34 => 2,  11 => 1,);
    }
}
/* {% extends 'base.html.twig' %}*/
/* {% block body %}*/
/*     {% include 'frontEnd/partials/pages/list/filter.html.twig'   %}*/
/* <hr>*/
/*     {% include 'frontEnd/partials/genericList/paging.html.twig'   %}*/
/*     {% include 'frontEnd/partials/genericList/listTable.html.twig'   %}*/
/* {% endblock %}*/
/* */
/* */
