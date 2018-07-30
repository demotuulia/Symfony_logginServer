<?php

/* frontEnd/partials/standard/tableHeader.html.twig */
class __TwigTemplate_9ddc792d5e6dc02be5da471d1eaedf646e13fbbcb50762d4319c47eaf66f76eb extends Twig_Template
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
        $__internal_7454ecc937929fd4919e104ea796cd61b9a05faa878053c8a4a919f703e65154 = $this->env->getExtension("native_profiler");
        $__internal_7454ecc937929fd4919e104ea796cd61b9a05faa878053c8a4a919f703e65154->enter($__internal_7454ecc937929fd4919e104ea796cd61b9a05faa878053c8a4a919f703e65154_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "frontEnd/partials/standard/tableHeader.html.twig"));

        // line 12
        echo "<thead class=\"thead-inverse\">
    ";
        // line 13
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["headerItems"]) ? $context["headerItems"] : $this->getContext($context, "headerItems")));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 14
            echo "        <th>
            <span class=\"tag\">";
            // line 15
            echo twig_escape_filter($this->env, $context["item"], "html", null, true);
            echo "</span>
        </th>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 18
        echo "</thead>";
        
        $__internal_7454ecc937929fd4919e104ea796cd61b9a05faa878053c8a4a919f703e65154->leave($__internal_7454ecc937929fd4919e104ea796cd61b9a05faa878053c8a4a919f703e65154_prof);

    }

    public function getTemplateName()
    {
        return "frontEnd/partials/standard/tableHeader.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  41 => 18,  32 => 15,  29 => 14,  25 => 13,  22 => 12,);
    }
}
/* {#*/
/*     A standard table header.*/
/*     As parameter you give an array of header items*/
/* */
/*     Example:*/
/* */
/*     {% include 'frontEnd/partials/standardTable/tableHeader.html.twig'*/
/*                 with {'headerItems': [ 'id' , 'Name' , 'Role', 'Email', ' ' , ' '] } only*/
/*     %}*/
/* */
/* #}*/
/* <thead class="thead-inverse">*/
/*     {% for item in headerItems %}*/
/*         <th>*/
/*             <span class="tag">{{ item }}</span>*/
/*         </th>*/
/*     {% endfor %}*/
/* </thead>*/
