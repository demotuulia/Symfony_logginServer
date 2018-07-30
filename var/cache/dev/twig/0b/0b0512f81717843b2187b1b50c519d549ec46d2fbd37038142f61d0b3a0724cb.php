<?php

/* frontEnd/partials/genericList/listTable.html.twig */
class __TwigTemplate_30068765dace871ca756870148fbc16a0afb7e46158816040d8c1ec0977892dc extends Twig_Template
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
        $__internal_6de1729e7a86bdb1a54ad904996dac5b901d720d657a1d4d2cc9f14690bc9d30 = $this->env->getExtension("native_profiler");
        $__internal_6de1729e7a86bdb1a54ad904996dac5b901d720d657a1d4d2cc9f14690bc9d30->enter($__internal_6de1729e7a86bdb1a54ad904996dac5b901d720d657a1d4d2cc9f14690bc9d30_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "frontEnd/partials/genericList/listTable.html.twig"));

        // line 50
        echo "

";
        // line 52
        if (((isset($context["totalRecords"]) ? $context["totalRecords"] : $this->getContext($context, "totalRecords")) > 0)) {
            // line 53
            echo "
    <table  class=\"";
            // line 54
            echo twig_escape_filter($this->env, (isset($context["listTableTypeClass"]) ? $context["listTableTypeClass"] : $this->getContext($context, "listTableTypeClass")), "html", null, true);
            echo "\">
        ";
            // line 56
            echo "        <thead class=\"thead-inverse\">
        <tr>
            ";
            // line 58
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["listHeaderItems"]) ? $context["listHeaderItems"] : $this->getContext($context, "listHeaderItems")));
            foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                // line 59
                echo "                <th>
                    ";
                // line 60
                if ($this->getAttribute($context["item"], "sortLink", array(), "any", true, true)) {
                    // line 61
                    echo "                        <a href=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "sortLink", array()), "html", null, true);
                    echo "\" >
                    ";
                }
                // line 63
                echo "                        <span class=\"tag\">";
                echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "label", array()), "html", null, true);
                echo "</span>
                    ";
                // line 64
                if ($this->getAttribute($context["item"], "sortLink", array(), "any", true, true)) {
                    // line 65
                    echo "                    </a>
                    ";
                }
                // line 67
                echo "                </th>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 69
            echo "        </tr>
        </thead>

        ";
            // line 73
            echo "        ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["list"]) ? $context["list"] : $this->getContext($context, "list")));
            foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                // line 74
                echo "            <tr class=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "class", array()), "html", null, true);
                echo "\">
                ";
                // line 75
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($context["item"]);
                foreach ($context['_seq'] as $context["key"] => $context["child"]) {
                    // line 76
                    echo "                    ";
                    if (($context["key"] != "class")) {
                        // line 77
                        echo "                    <td> ";
                        echo twig_escape_filter($this->env, $context["child"], "html", null, true);
                        echo "</td>
                    ";
                    }
                    // line 79
                    echo "                ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['key'], $context['child'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 80
                echo "            </tr>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 82
            echo "    </table>

";
        } else {
            // line 85
            echo "
    No records found for this selection.

";
        }
        
        $__internal_6de1729e7a86bdb1a54ad904996dac5b901d720d657a1d4d2cc9f14690bc9d30->leave($__internal_6de1729e7a86bdb1a54ad904996dac5b901d720d657a1d4d2cc9f14690bc9d30_prof);

    }

    public function getTemplateName()
    {
        return "frontEnd/partials/genericList/listTable.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  118 => 85,  113 => 82,  106 => 80,  100 => 79,  94 => 77,  91 => 76,  87 => 75,  82 => 74,  77 => 73,  72 => 69,  65 => 67,  61 => 65,  59 => 64,  54 => 63,  48 => 61,  46 => 60,  43 => 59,  39 => 58,  35 => 56,  31 => 54,  28 => 53,  26 => 52,  22 => 50,);
    }
}
/* {#*/
/*  This is a generic template for list table*/
/*  and work togther with the class AppBundle\Manager\Manager\FrontEndPaging*/
/* */
/*    To render a table you must provide 2 arrays:*/
/*    . 'listHeaderItems'      Table header items with possible sort links*/
/*    . 'list'             Items to rendender in the table*/
/* */
/*    Example*/
/* */
/*    We have 2 colums 'Id' and 'Date' and 2 rows*/
/* */
/*     'listHeaderItems'*/
/*     ---------------*/
/*    array (*/
/*       0 =>*/
/*         array (*/
/*         'label' => 'Id',*/
/*         ),*/
/* */
/*       1 =>*/
/*       array (*/
/*         'label' => 'Date',*/
/*         'sortItem' => 'L.timestamp',*/
/*         'sortLink' => '/list/?page=1&sort=L.timestamp&sortDir=DESC',*/
/*       ),*/
/*     )*/
/* */
/* */
/*     list*/
/*     ---------*/
/* */
/*     array (*/
/*           0 =>*/
/*           array (*/
/*             'logid' => 16,*/
/*             'timestamp' => '2016-07-24 11:26:29',*/
/*             'class' => 'table_succes'  // if not in use give ' '*/
/*           ),*/
/*           1 =>*/
/*           array (*/
/*             0 =>*/
/*             'logid' => 18,*/
/*             'timestamp' => '2016-07-24 11:26:29',*/
/*             'class' => 'table-danger'  // if not in use give ' '*/
/*           )*/
/*     )*/
/* */
/* #}*/
/* */
/* */
/* {% if totalRecords >0 %}*/
/* */
/*     <table  class="{{ listTableTypeClass }}">*/
/*         {# header #}*/
/*         <thead class="thead-inverse">*/
/*         <tr>*/
/*             {% for item in listHeaderItems %}*/
/*                 <th>*/
/*                     {% if item.sortLink is  defined %}*/
/*                         <a href="{{ item.sortLink }}" >*/
/*                     {% endif %}*/
/*                         <span class="tag">{{ item.label }}</span>*/
/*                     {% if item.sortLink is  defined %}*/
/*                     </a>*/
/*                     {% endif %}*/
/*                 </th>*/
/*             {% endfor %}*/
/*         </tr>*/
/*         </thead>*/
/* */
/*         {# Table rows #}*/
/*         {% for item in list %}*/
/*             <tr class="{{ item.class }}">*/
/*                 {% for key, child in item  %}*/
/*                     {% if key != 'class' %}*/
/*                     <td> {{ child }}</td>*/
/*                     {% endif %}*/
/*                 {% endfor %}*/
/*             </tr>*/
/*         {% endfor %}*/
/*     </table>*/
/* */
/* {% else %}*/
/* */
/*     No records found for this selection.*/
/* */
/* {% endif %}*/
/* */
