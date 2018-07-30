<?php

/* frontEnd/login.html.twig */
class __TwigTemplate_7f5d6b30baf3addb33cbf1c2a3d135ec27f33d5f880525411837f0a434a7b9cd extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("base.html.twig", "frontEnd/login.html.twig", 1);
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
        $__internal_8722797c3259bc447f3c80add95be7d1f142e7109083617061cdbe17c23f359d = $this->env->getExtension("native_profiler");
        $__internal_8722797c3259bc447f3c80add95be7d1f142e7109083617061cdbe17c23f359d->enter($__internal_8722797c3259bc447f3c80add95be7d1f142e7109083617061cdbe17c23f359d_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "frontEnd/login.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_8722797c3259bc447f3c80add95be7d1f142e7109083617061cdbe17c23f359d->leave($__internal_8722797c3259bc447f3c80add95be7d1f142e7109083617061cdbe17c23f359d_prof);

    }

    // line 2
    public function block_body($context, array $blocks = array())
    {
        $__internal_91de29a2fc3cb71ce61d2ddf7f712a10f6222b09c81847c6b12cc2bd4a4fb82a = $this->env->getExtension("native_profiler");
        $__internal_91de29a2fc3cb71ce61d2ddf7f712a10f6222b09c81847c6b12cc2bd4a4fb82a->enter($__internal_91de29a2fc3cb71ce61d2ddf7f712a10f6222b09c81847c6b12cc2bd4a4fb82a_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 3
        echo "


";
        // line 6
        if ((isset($context["error"]) ? $context["error"] : $this->getContext($context, "error"))) {
            // line 7
            echo "    <div class=\"alert-danger\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans($this->getAttribute((isset($context["error"]) ? $context["error"] : $this->getContext($context, "error")), "messageKey", array()), $this->getAttribute((isset($context["error"]) ? $context["error"] : $this->getContext($context, "error")), "messageData", array()), "security"), "html", null, true);
            echo "</div>
";
        }
        // line 9
        echo "

";
        // line 11
        $this->env->getExtension('form')->renderer->setTheme((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), array(0 => "bootstrap_3_horizontal_layout.html.twig"));
        // line 12
        echo         $this->env->getExtension('form')->renderer->renderBlock(        // line 13
(isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'form_start', array("attr" => array("class" =>         // line 14
(isset($context["formClass"]) ? $context["formClass"] : $this->getContext($context, "formClass")), "role" => "form")));
        // line 16
        echo "
";
        // line 17
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'widget');
        echo "
";
        // line 18
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'form_end');
        echo "
";
        
        $__internal_91de29a2fc3cb71ce61d2ddf7f712a10f6222b09c81847c6b12cc2bd4a4fb82a->leave($__internal_91de29a2fc3cb71ce61d2ddf7f712a10f6222b09c81847c6b12cc2bd4a4fb82a_prof);

    }

    public function getTemplateName()
    {
        return "frontEnd/login.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  70 => 18,  66 => 17,  63 => 16,  61 => 14,  60 => 13,  59 => 12,  57 => 11,  53 => 9,  47 => 7,  45 => 6,  40 => 3,  34 => 2,  11 => 1,);
    }
}
/* {% extends 'base.html.twig' %}*/
/* {% block body %}*/
/* */
/* */
/* */
/* {% if error %}*/
/*     <div class="alert-danger">{{ error.messageKey|trans(error.messageData, 'security') }}</div>*/
/* {% endif %}*/
/* */
/* */
/* {% form_theme form 'bootstrap_3_horizontal_layout.html.twig' %}*/
/* {{ form_start(*/
/*     form ,*/
/*     { 'attr': {'class':  formClass , 'role' : 'form' } }*/
/* )*/
/* }}*/
/* {{ form_widget(form) }}*/
/* {{ form_end(form) }}*/
/* {% endblock %}*/
/* */
/* */
