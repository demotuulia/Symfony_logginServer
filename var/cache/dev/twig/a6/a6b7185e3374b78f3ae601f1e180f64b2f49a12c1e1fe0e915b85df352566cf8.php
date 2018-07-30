<?php

/* bootstrap_3_horizontal_layout.html.twig */
class __TwigTemplate_b960d3005f26f5af3f0af44e211f71267ab09b1485cde91da6682c6aa5d00f1d extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $_trait_0 = $this->loadTemplate("bootstrap_3_layout.html.twig", "bootstrap_3_horizontal_layout.html.twig", 1);
        // line 1
        if (!$_trait_0->isTraitable()) {
            throw new Twig_Error_Runtime('Template "'."bootstrap_3_layout.html.twig".'" cannot be used as a trait.');
        }
        $_trait_0_blocks = $_trait_0->getBlocks();

        $this->traits = $_trait_0_blocks;

        $this->blocks = array_merge(
            $this->traits,
            array(
                'form_start' => array($this, 'block_form_start'),
                'form_label' => array($this, 'block_form_label'),
                'form_label_class' => array($this, 'block_form_label_class'),
                'form_row' => array($this, 'block_form_row'),
                'checkbox_row' => array($this, 'block_checkbox_row'),
                'radio_row' => array($this, 'block_radio_row'),
                'checkbox_radio_row' => array($this, 'block_checkbox_radio_row'),
                'submit_row' => array($this, 'block_submit_row'),
                'reset_row' => array($this, 'block_reset_row'),
                'form_group_class' => array($this, 'block_form_group_class'),
            )
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_f067effc5a4c9fc6998d1593c1081ec5b01a925de6105cbdb9f10c6b138b1614 = $this->env->getExtension("native_profiler");
        $__internal_f067effc5a4c9fc6998d1593c1081ec5b01a925de6105cbdb9f10c6b138b1614->enter($__internal_f067effc5a4c9fc6998d1593c1081ec5b01a925de6105cbdb9f10c6b138b1614_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "bootstrap_3_horizontal_layout.html.twig"));

        // line 2
        echo "
";
        // line 3
        $this->displayBlock('form_start', $context, $blocks);
        // line 7
        echo "
";
        // line 9
        echo "
";
        // line 10
        $this->displayBlock('form_label', $context, $blocks);
        // line 20
        echo "
";
        // line 21
        $this->displayBlock('form_label_class', $context, $blocks);
        // line 24
        echo "
";
        // line 26
        echo "
";
        // line 27
        $this->displayBlock('form_row', $context, $blocks);
        // line 36
        echo "
";
        // line 37
        $this->displayBlock('checkbox_row', $context, $blocks);
        // line 40
        echo "
";
        // line 41
        $this->displayBlock('radio_row', $context, $blocks);
        // line 44
        echo "
";
        // line 45
        $this->displayBlock('checkbox_radio_row', $context, $blocks);
        // line 56
        echo "
";
        // line 57
        $this->displayBlock('submit_row', $context, $blocks);
        // line 67
        echo "
";
        // line 68
        $this->displayBlock('reset_row', $context, $blocks);
        // line 78
        echo "
";
        // line 79
        $this->displayBlock('form_group_class', $context, $blocks);
        
        $__internal_f067effc5a4c9fc6998d1593c1081ec5b01a925de6105cbdb9f10c6b138b1614->leave($__internal_f067effc5a4c9fc6998d1593c1081ec5b01a925de6105cbdb9f10c6b138b1614_prof);

    }

    // line 3
    public function block_form_start($context, array $blocks = array())
    {
        $__internal_09635ee411ec48f7e9ce36b5bde6c1721bbc0ad36522dd87a957a6bc11dee04f = $this->env->getExtension("native_profiler");
        $__internal_09635ee411ec48f7e9ce36b5bde6c1721bbc0ad36522dd87a957a6bc11dee04f->enter($__internal_09635ee411ec48f7e9ce36b5bde6c1721bbc0ad36522dd87a957a6bc11dee04f_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "form_start"));

        // line 4
        $context["attr"] = twig_array_merge((isset($context["attr"]) ? $context["attr"] : $this->getContext($context, "attr")), array("class" => trim(((($this->getAttribute((isset($context["attr"]) ? $context["attr"] : null), "class", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["attr"]) ? $context["attr"] : null), "class", array()), "")) : ("")) . " form-horizontal"))));
        // line 5
        $this->displayParentBlock("form_start", $context, $blocks);
        
        $__internal_09635ee411ec48f7e9ce36b5bde6c1721bbc0ad36522dd87a957a6bc11dee04f->leave($__internal_09635ee411ec48f7e9ce36b5bde6c1721bbc0ad36522dd87a957a6bc11dee04f_prof);

    }

    // line 10
    public function block_form_label($context, array $blocks = array())
    {
        $__internal_88f37b832584435cd0022a6de83a7e682af50e1bfe64558fa5e3bd6cc5c3eeb8 = $this->env->getExtension("native_profiler");
        $__internal_88f37b832584435cd0022a6de83a7e682af50e1bfe64558fa5e3bd6cc5c3eeb8->enter($__internal_88f37b832584435cd0022a6de83a7e682af50e1bfe64558fa5e3bd6cc5c3eeb8_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "form_label"));

        // line 11
        ob_start();
        // line 12
        echo "    ";
        if (((isset($context["label"]) ? $context["label"] : $this->getContext($context, "label")) === false)) {
            // line 13
            echo "        <div class=\"";
            $this->displayBlock("form_label_class", $context, $blocks);
            echo "\"></div>
    ";
        } else {
            // line 15
            echo "        ";
            $context["label_attr"] = twig_array_merge((isset($context["label_attr"]) ? $context["label_attr"] : $this->getContext($context, "label_attr")), array("class" => trim((((($this->getAttribute((isset($context["label_attr"]) ? $context["label_attr"] : null), "class", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["label_attr"]) ? $context["label_attr"] : null), "class", array()), "")) : ("")) . " ") . $this->renderBlock("form_label_class", $context, $blocks)))));
            // line 16
            $this->displayParentBlock("form_label", $context, $blocks);
        }
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
        
        $__internal_88f37b832584435cd0022a6de83a7e682af50e1bfe64558fa5e3bd6cc5c3eeb8->leave($__internal_88f37b832584435cd0022a6de83a7e682af50e1bfe64558fa5e3bd6cc5c3eeb8_prof);

    }

    // line 21
    public function block_form_label_class($context, array $blocks = array())
    {
        $__internal_33971eb6a8146b30155706a07eb8ae464093a3170315a13c53f3067739f0201e = $this->env->getExtension("native_profiler");
        $__internal_33971eb6a8146b30155706a07eb8ae464093a3170315a13c53f3067739f0201e->enter($__internal_33971eb6a8146b30155706a07eb8ae464093a3170315a13c53f3067739f0201e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "form_label_class"));

        // line 22
        echo "col-sm-2";
        
        $__internal_33971eb6a8146b30155706a07eb8ae464093a3170315a13c53f3067739f0201e->leave($__internal_33971eb6a8146b30155706a07eb8ae464093a3170315a13c53f3067739f0201e_prof);

    }

    // line 27
    public function block_form_row($context, array $blocks = array())
    {
        $__internal_550e5bce8cabb5795c9a6e0453aa26089c1aa7266052e4d98a3dc5260ea5f057 = $this->env->getExtension("native_profiler");
        $__internal_550e5bce8cabb5795c9a6e0453aa26089c1aa7266052e4d98a3dc5260ea5f057->enter($__internal_550e5bce8cabb5795c9a6e0453aa26089c1aa7266052e4d98a3dc5260ea5f057_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "form_row"));

        // line 28
        echo "<div class=\"form-group";
        if ((( !(isset($context["compound"]) ? $context["compound"] : $this->getContext($context, "compound")) || ((array_key_exists("force_error", $context)) ? (_twig_default_filter((isset($context["force_error"]) ? $context["force_error"] : $this->getContext($context, "force_error")), false)) : (false))) &&  !(isset($context["valid"]) ? $context["valid"] : $this->getContext($context, "valid")))) {
            echo " has-error";
        }
        echo "\">";
        // line 29
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'label');
        // line 30
        echo "<div class=\"";
        $this->displayBlock("form_group_class", $context, $blocks);
        echo "\">";
        // line 31
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'widget');
        // line 32
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'errors');
        // line 33
        echo "</div>
";
        // line 34
        echo "</div>";
        
        $__internal_550e5bce8cabb5795c9a6e0453aa26089c1aa7266052e4d98a3dc5260ea5f057->leave($__internal_550e5bce8cabb5795c9a6e0453aa26089c1aa7266052e4d98a3dc5260ea5f057_prof);

    }

    // line 37
    public function block_checkbox_row($context, array $blocks = array())
    {
        $__internal_28f4399181cf844164f4e17dedcc64127c701eff6fc94793affd6624222b5f37 = $this->env->getExtension("native_profiler");
        $__internal_28f4399181cf844164f4e17dedcc64127c701eff6fc94793affd6624222b5f37->enter($__internal_28f4399181cf844164f4e17dedcc64127c701eff6fc94793affd6624222b5f37_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "checkbox_row"));

        // line 38
        $this->displayBlock("checkbox_radio_row", $context, $blocks);
        
        $__internal_28f4399181cf844164f4e17dedcc64127c701eff6fc94793affd6624222b5f37->leave($__internal_28f4399181cf844164f4e17dedcc64127c701eff6fc94793affd6624222b5f37_prof);

    }

    // line 41
    public function block_radio_row($context, array $blocks = array())
    {
        $__internal_4f5b0dc3748f917722c1ed6d3b326e63a12927e5a5caa518ec65cf3e997cd21f = $this->env->getExtension("native_profiler");
        $__internal_4f5b0dc3748f917722c1ed6d3b326e63a12927e5a5caa518ec65cf3e997cd21f->enter($__internal_4f5b0dc3748f917722c1ed6d3b326e63a12927e5a5caa518ec65cf3e997cd21f_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "radio_row"));

        // line 42
        $this->displayBlock("checkbox_radio_row", $context, $blocks);
        
        $__internal_4f5b0dc3748f917722c1ed6d3b326e63a12927e5a5caa518ec65cf3e997cd21f->leave($__internal_4f5b0dc3748f917722c1ed6d3b326e63a12927e5a5caa518ec65cf3e997cd21f_prof);

    }

    // line 45
    public function block_checkbox_radio_row($context, array $blocks = array())
    {
        $__internal_b9e249aa1153c9d6f1a75a63d719263ca39ab189e824ce477a96d60f328e8993 = $this->env->getExtension("native_profiler");
        $__internal_b9e249aa1153c9d6f1a75a63d719263ca39ab189e824ce477a96d60f328e8993->enter($__internal_b9e249aa1153c9d6f1a75a63d719263ca39ab189e824ce477a96d60f328e8993_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "checkbox_radio_row"));

        // line 46
        ob_start();
        // line 47
        echo "    <div class=\"form-group";
        if ( !(isset($context["valid"]) ? $context["valid"] : $this->getContext($context, "valid"))) {
            echo " has-error";
        }
        echo "\">
        <div class=\"";
        // line 48
        $this->displayBlock("form_label_class", $context, $blocks);
        echo "\"></div>
        <div class=\"";
        // line 49
        $this->displayBlock("form_group_class", $context, $blocks);
        echo "\">
            ";
        // line 50
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'widget');
        echo "
            ";
        // line 51
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'errors');
        echo "
        </div>
    </div>
";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
        
        $__internal_b9e249aa1153c9d6f1a75a63d719263ca39ab189e824ce477a96d60f328e8993->leave($__internal_b9e249aa1153c9d6f1a75a63d719263ca39ab189e824ce477a96d60f328e8993_prof);

    }

    // line 57
    public function block_submit_row($context, array $blocks = array())
    {
        $__internal_16a68bba71565d87c7123f6b44d77c45d0370b1f4f0d7624c1231368de25c56a = $this->env->getExtension("native_profiler");
        $__internal_16a68bba71565d87c7123f6b44d77c45d0370b1f4f0d7624c1231368de25c56a->enter($__internal_16a68bba71565d87c7123f6b44d77c45d0370b1f4f0d7624c1231368de25c56a_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "submit_row"));

        // line 58
        ob_start();
        // line 59
        echo "    <div class=\"form-group\">
        <div class=\"";
        // line 60
        $this->displayBlock("form_label_class", $context, $blocks);
        echo "\"></div>
        <div class=\"";
        // line 61
        $this->displayBlock("form_group_class", $context, $blocks);
        echo "\">
            ";
        // line 62
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'widget');
        echo "
        </div>
    </div>
";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
        
        $__internal_16a68bba71565d87c7123f6b44d77c45d0370b1f4f0d7624c1231368de25c56a->leave($__internal_16a68bba71565d87c7123f6b44d77c45d0370b1f4f0d7624c1231368de25c56a_prof);

    }

    // line 68
    public function block_reset_row($context, array $blocks = array())
    {
        $__internal_bb830fc650edef154958291690afda40260df49f68ed74ca73046a758e28f53b = $this->env->getExtension("native_profiler");
        $__internal_bb830fc650edef154958291690afda40260df49f68ed74ca73046a758e28f53b->enter($__internal_bb830fc650edef154958291690afda40260df49f68ed74ca73046a758e28f53b_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "reset_row"));

        // line 69
        ob_start();
        // line 70
        echo "    <div class=\"form-group\">
        <div class=\"";
        // line 71
        $this->displayBlock("form_label_class", $context, $blocks);
        echo "\"></div>
        <div class=\"";
        // line 72
        $this->displayBlock("form_group_class", $context, $blocks);
        echo "\">
            ";
        // line 73
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'widget');
        echo "
        </div>
    </div>
";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
        
        $__internal_bb830fc650edef154958291690afda40260df49f68ed74ca73046a758e28f53b->leave($__internal_bb830fc650edef154958291690afda40260df49f68ed74ca73046a758e28f53b_prof);

    }

    // line 79
    public function block_form_group_class($context, array $blocks = array())
    {
        $__internal_8f221e0a60779faf32fbeab04be26ca8bdacc8fc4c143cc3b2cabf094a59964a = $this->env->getExtension("native_profiler");
        $__internal_8f221e0a60779faf32fbeab04be26ca8bdacc8fc4c143cc3b2cabf094a59964a->enter($__internal_8f221e0a60779faf32fbeab04be26ca8bdacc8fc4c143cc3b2cabf094a59964a_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "form_group_class"));

        // line 80
        echo "col-sm-10";
        
        $__internal_8f221e0a60779faf32fbeab04be26ca8bdacc8fc4c143cc3b2cabf094a59964a->leave($__internal_8f221e0a60779faf32fbeab04be26ca8bdacc8fc4c143cc3b2cabf094a59964a_prof);

    }

    public function getTemplateName()
    {
        return "bootstrap_3_horizontal_layout.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  327 => 80,  321 => 79,  309 => 73,  305 => 72,  301 => 71,  298 => 70,  296 => 69,  290 => 68,  278 => 62,  274 => 61,  270 => 60,  267 => 59,  265 => 58,  259 => 57,  247 => 51,  243 => 50,  239 => 49,  235 => 48,  228 => 47,  226 => 46,  220 => 45,  213 => 42,  207 => 41,  200 => 38,  194 => 37,  187 => 34,  184 => 33,  182 => 32,  180 => 31,  176 => 30,  174 => 29,  168 => 28,  162 => 27,  155 => 22,  149 => 21,  140 => 16,  137 => 15,  131 => 13,  128 => 12,  126 => 11,  120 => 10,  113 => 5,  111 => 4,  105 => 3,  98 => 79,  95 => 78,  93 => 68,  90 => 67,  88 => 57,  85 => 56,  83 => 45,  80 => 44,  78 => 41,  75 => 40,  73 => 37,  70 => 36,  68 => 27,  65 => 26,  62 => 24,  60 => 21,  57 => 20,  55 => 10,  52 => 9,  49 => 7,  47 => 3,  44 => 2,  14 => 1,);
    }
}
/* {% use "bootstrap_3_layout.html.twig" %}*/
/* */
/* {% block form_start -%}*/
/*     {% set attr = attr|merge({class: (attr.class|default('') ~ ' form-horizontal')|trim}) %}*/
/*     {{- parent() -}}*/
/* {%- endblock form_start %}*/
/* */
/* {# Labels #}*/
/* */
/* {% block form_label -%}*/
/* {% spaceless %}*/
/*     {% if label is same as(false) %}*/
/*         <div class="{{ block('form_label_class') }}"></div>*/
/*     {% else %}*/
/*         {% set label_attr = label_attr|merge({class: (label_attr.class|default('') ~ ' ' ~ block('form_label_class'))|trim}) %}*/
/*         {{- parent() -}}*/
/*     {% endif %}*/
/* {% endspaceless %}*/
/* {%- endblock form_label %}*/
/* */
/* {% block form_label_class -%}*/
/* col-sm-2*/
/* {%- endblock form_label_class %}*/
/* */
/* {# Rows #}*/
/* */
/* {% block form_row -%}*/
/*     <div class="form-group{% if (not compound or force_error|default(false)) and not valid %} has-error{% endif %}">*/
/*         {{- form_label(form) -}}*/
/*         <div class="{{ block('form_group_class') }}">*/
/*             {{- form_widget(form) -}}*/
/*             {{- form_errors(form) -}}*/
/*         </div>*/
/* {##}</div>*/
/* {%- endblock form_row %}*/
/* */
/* {% block checkbox_row -%}*/
/*     {{- block('checkbox_radio_row') -}}*/
/* {%- endblock checkbox_row %}*/
/* */
/* {% block radio_row -%}*/
/*     {{- block('checkbox_radio_row') -}}*/
/* {%- endblock radio_row %}*/
/* */
/* {% block checkbox_radio_row -%}*/
/* {% spaceless %}*/
/*     <div class="form-group{% if not valid %} has-error{% endif %}">*/
/*         <div class="{{ block('form_label_class') }}"></div>*/
/*         <div class="{{ block('form_group_class') }}">*/
/*             {{ form_widget(form) }}*/
/*             {{ form_errors(form) }}*/
/*         </div>*/
/*     </div>*/
/* {% endspaceless %}*/
/* {%- endblock checkbox_radio_row %}*/
/* */
/* {% block submit_row -%}*/
/* {% spaceless %}*/
/*     <div class="form-group">*/
/*         <div class="{{ block('form_label_class') }}"></div>*/
/*         <div class="{{ block('form_group_class') }}">*/
/*             {{ form_widget(form) }}*/
/*         </div>*/
/*     </div>*/
/* {% endspaceless %}*/
/* {% endblock submit_row %}*/
/* */
/* {% block reset_row -%}*/
/* {% spaceless %}*/
/*     <div class="form-group">*/
/*         <div class="{{ block('form_label_class') }}"></div>*/
/*         <div class="{{ block('form_group_class') }}">*/
/*             {{ form_widget(form) }}*/
/*         </div>*/
/*     </div>*/
/* {% endspaceless %}*/
/* {% endblock reset_row %}*/
/* */
/* {% block form_group_class -%}*/
/* col-sm-10*/
/* {%- endblock form_group_class %}*/
/* */
