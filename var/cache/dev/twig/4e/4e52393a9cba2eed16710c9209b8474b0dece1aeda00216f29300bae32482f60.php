<?php

/* basePartials/menu.html.twig */
class __TwigTemplate_96e59c1c46deed29881a2dd5771889e7891ca88cd14a2c1c903af06c9f8a4c28 extends Twig_Template
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
        $__internal_1c2af1755a30b808497f6a930f3d5f28518ae83b51a7aaf95857ce6cd771b176 = $this->env->getExtension("native_profiler");
        $__internal_1c2af1755a30b808497f6a930f3d5f28518ae83b51a7aaf95857ce6cd771b176->enter($__internal_1c2af1755a30b808497f6a930f3d5f28518ae83b51a7aaf95857ce6cd771b176_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "basePartials/menu.html.twig"));

        // line 1
        echo "
<nav class=\"navbar navbar-dark bg-inverse\">
    <div class=\"container\">

        <div class=\"pull-xs-left\">
            <img src=\"/images/logo.png\">
        </div>

        <div class=\"pull-xs-right text-warning tag\">
            ";
        // line 10
        if (((isset($context["currentUserName"]) ? $context["currentUserName"] : $this->getContext($context, "currentUserName")) != "")) {
            // line 11
            echo "                You are logged in as: ";
            echo twig_escape_filter($this->env, (isset($context["currentUserName"]) ? $context["currentUserName"] : $this->getContext($context, "currentUserName")), "html", null, true);
            echo "&nbsp;&nbsp;&nbsp;
            ";
        }
        // line 13
        echo "        </div>

        <div class=\"pull-xs-left\">
            <ul class=\"nav navbar-nav\">
                ";
        // line 17
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["mainNavigation"]) ? $context["mainNavigation"] : $this->getContext($context, "mainNavigation")));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 18
            echo "                    <li class=\"nav-item ";
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "activeClass", array()), "html", null, true);
            echo "\"  >
                        <a href=\"";
            // line 19
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "route", array()), "html", null, true);
            echo "\" class=\"nav-link\">
                            ";
            // line 20
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "label", array()), "html", null, true);
            echo "
                        </a>
                    </li>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 24
        echo "            </ul>
        </div>

    </div>

</nav> <!-- /navbar -->

<div class=\"clearfix\">&nbsp;</div>

";
        
        $__internal_1c2af1755a30b808497f6a930f3d5f28518ae83b51a7aaf95857ce6cd771b176->leave($__internal_1c2af1755a30b808497f6a930f3d5f28518ae83b51a7aaf95857ce6cd771b176_prof);

    }

    public function getTemplateName()
    {
        return "basePartials/menu.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  70 => 24,  60 => 20,  56 => 19,  51 => 18,  47 => 17,  41 => 13,  35 => 11,  33 => 10,  22 => 1,);
    }
}
/* */
/* <nav class="navbar navbar-dark bg-inverse">*/
/*     <div class="container">*/
/* */
/*         <div class="pull-xs-left">*/
/*             <img src="/images/logo.png">*/
/*         </div>*/
/* */
/*         <div class="pull-xs-right text-warning tag">*/
/*             {% if currentUserName != '' %}*/
/*                 You are logged in as: {{ currentUserName }}&nbsp;&nbsp;&nbsp;*/
/*             {% endif %}*/
/*         </div>*/
/* */
/*         <div class="pull-xs-left">*/
/*             <ul class="nav navbar-nav">*/
/*                 {% for item in mainNavigation %}*/
/*                     <li class="nav-item {{ item.activeClass }}"  >*/
/*                         <a href="{{ item.route }}" class="nav-link">*/
/*                             {{ item.label }}*/
/*                         </a>*/
/*                     </li>*/
/*                 {% endfor %}*/
/*             </ul>*/
/*         </div>*/
/* */
/*     </div>*/
/* */
/* </nav> <!-- /navbar -->*/
/* */
/* <div class="clearfix">&nbsp;</div>*/
/* */
/* */
