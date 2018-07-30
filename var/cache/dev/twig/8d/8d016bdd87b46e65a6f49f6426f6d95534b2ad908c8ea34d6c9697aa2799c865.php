<?php

/* frontEnd/partials/standard/from.html.twig */
class __TwigTemplate_4c814c3ded3ce031e943bc4896d5e69cd2e29e7217f4bdf5d3dd77a5d65ab70b extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_b1c5e0c1cb219c788d29409e3f904ed00229454ceb3f8fc74628938cb58e1138 = $this->env->getExtension("native_profiler");
        $__internal_b1c5e0c1cb219c788d29409e3f904ed00229454ceb3f8fc74628938cb58e1138->enter($__internal_b1c5e0c1cb219c788d29409e3f904ed00229454ceb3f8fc74628938cb58e1138_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "frontEnd/partials/standard/from.html.twig"));

        // line 5
        echo "
<div class=\"alert-danger\">
    ";
        // line 7
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["errors"]) ? $context["errors"] : $this->getContext($context, "errors")));
        foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
            // line 8
            echo "        ";
            echo twig_escape_filter($this->env, $context["error"], "html", null, true);
            echo "<br>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['error'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 10
        echo "</div>

";
        // line 12
        $this->env->getExtension('form')->renderer->setTheme((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), array(0 => "bootstrap_3_horizontal_layout.html.twig"));
        // line 13
        echo         $this->env->getExtension('form')->renderer->renderBlock(        // line 14
(isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'form_start', array("attr" => array("class" =>         // line 15
(isset($context["formClass"]) ? $context["formClass"] : $this->getContext($context, "formClass")), "role" => "form")));
        // line 17
        echo "
";
        // line 18
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'widget');
        echo "
";
        // line 19
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'form_end');
        echo "
";
        
        $__internal_b1c5e0c1cb219c788d29409e3f904ed00229454ceb3f8fc74628938cb58e1138->leave($__internal_b1c5e0c1cb219c788d29409e3f904ed00229454ceb3f8fc74628938cb58e1138_prof);

    }

    public function getTemplateName()
    {
        return "frontEnd/partials/standard/from.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  56 => 19,  52 => 18,  49 => 17,  47 => 15,  46 => 14,  45 => 13,  43 => 12,  39 => 10,  30 => 8,  26 => 7,  22 => 5,);
    }
}
/* {#*/
/*     A standard from.*/
/* */
/* #}*/
/* */
/* <div class="alert-danger">*/
/*     {% for error in errors %}*/
/*         {{ error }}<br>*/
/*     {% endfor %}*/
/* </div>*/
/* */
/* {% form_theme form 'bootstrap_3_horizontal_layout.html.twig' %}*/
/* {{ form_start(*/
/* form ,*/
/* { 'attr': {'class':  formClass , 'role' : 'form' } }*/
/* )*/
/* }}*/
/* {{ form_widget(form) }}*/
/* {{ form_end(form) }}*/
/* */
