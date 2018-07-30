<?php

/* frontEnd/mailAlertList.html.twig */
class __TwigTemplate_968e7656710ffa85b8f4f1af02a558b982cb917bfcc6fdd0aa850478d3d4b342 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("base.html.twig", "frontEnd/mailAlertList.html.twig", 1);
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
        $__internal_854f1709e0b0123795c2a26b916ae7052cc05d5dde07e7e176dae313e3a2003c = $this->env->getExtension("native_profiler");
        $__internal_854f1709e0b0123795c2a26b916ae7052cc05d5dde07e7e176dae313e3a2003c->enter($__internal_854f1709e0b0123795c2a26b916ae7052cc05d5dde07e7e176dae313e3a2003c_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "frontEnd/mailAlertList.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_854f1709e0b0123795c2a26b916ae7052cc05d5dde07e7e176dae313e3a2003c->leave($__internal_854f1709e0b0123795c2a26b916ae7052cc05d5dde07e7e176dae313e3a2003c_prof);

    }

    // line 2
    public function block_body($context, array $blocks = array())
    {
        $__internal_97c97a4250e7ed5066658d08fe9dff810b5c577df6f331a61b6427472b9fd76e = $this->env->getExtension("native_profiler");
        $__internal_97c97a4250e7ed5066658d08fe9dff810b5c577df6f331a61b6427472b9fd76e->enter($__internal_97c97a4250e7ed5066658d08fe9dff810b5c577df6f331a61b6427472b9fd76e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 3
        echo "
<p>
    <a href=\"/editmailalert/new\" class=\"btn btn-success btn-sm\" role=\"button\" >
        Insert Alert
    </a>
</p>

    <table class=\"";
        // line 10
        echo twig_escape_filter($this->env, (isset($context["tableTypeClass"]) ? $context["tableTypeClass"] : $this->getContext($context, "tableTypeClass")), "html", null, true);
        echo "\">
        ";
        // line 11
        $this->loadTemplate("frontEnd/partials/standard/tableHeader.html.twig", "frontEnd/mailAlertList.html.twig", 11)->display(array("headerItems" => array(0 => "id", 1 => "System", 2 => "Level", 3 => "Type", 4 => " ", 5 => " ")));
        // line 14
        echo "

        </thead>

            ";
        // line 18
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["list"]) ? $context["list"] : $this->getContext($context, "list")));
        foreach ($context['_seq'] as $context["_key"] => $context["mailAlert"]) {
            // line 19
            echo "            <tr>

                    ";
            // line 21
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["mailAlert"], "filters", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["filterRow"]) {
                // line 22
                echo "                        ";
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($context["filterRow"]);
                foreach ($context['_seq'] as $context["key"] => $context["filterItem"]) {
                    // line 23
                    echo "                            <td>
                                ";
                    // line 24
                    echo twig_escape_filter($this->env, $this->getAttribute($context["filterItem"], "filterField", array()), "html", null, true);
                    echo " ";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["filterItem"], "operator", array()), "html", null, true);
                    echo " ";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["filterItem"], "valueLabbel", array()), "html", null, true);
                    echo "
                            </td>
                        ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['key'], $context['filterItem'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 27
                echo "                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['filterRow'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 28
            echo "
                    <td>
                        <a href=\"/editmailalert/";
            // line 30
            echo twig_escape_filter($this->env, $this->getAttribute($context["mailAlert"], "mailAlertId", array()), "html", null, true);
            echo "\"  class=\"btn btn-primary btn-sm\" role=\"button\">
                               Edit
                        </a>
                    </td>

                    <td>
                        <a href=\"/deletemailalert/";
            // line 36
            echo twig_escape_filter($this->env, $this->getAttribute($context["mailAlert"], "mailAlertId", array()), "html", null, true);
            echo "\"  class=\"btn btn-danger btn-sm\" role=\"button\">
                                Delete
                        </a>
                    </td>

            </tr>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['mailAlert'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 43
        echo "    </table>
";
        
        $__internal_97c97a4250e7ed5066658d08fe9dff810b5c577df6f331a61b6427472b9fd76e->leave($__internal_97c97a4250e7ed5066658d08fe9dff810b5c577df6f331a61b6427472b9fd76e_prof);

    }

    public function getTemplateName()
    {
        return "frontEnd/mailAlertList.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  126 => 43,  113 => 36,  104 => 30,  100 => 28,  94 => 27,  81 => 24,  78 => 23,  73 => 22,  69 => 21,  65 => 19,  61 => 18,  55 => 14,  53 => 11,  49 => 10,  40 => 3,  34 => 2,  11 => 1,);
    }
}
/* {% extends 'base.html.twig' %}*/
/* {% block body %}*/
/* */
/* <p>*/
/*     <a href="/editmailalert/new" class="btn btn-success btn-sm" role="button" >*/
/*         Insert Alert*/
/*     </a>*/
/* </p>*/
/* */
/*     <table class="{{ tableTypeClass }}">*/
/*         {% include 'frontEnd/partials/standard/tableHeader.html.twig'*/
/*         with {'headerItems': [ 'id' , 'System' , 'Level', 'Type', ' ' , ' '] } only*/
/*         %}*/
/* */
/* */
/*         </thead>*/
/* */
/*             {% for mailAlert in list %}*/
/*             <tr>*/
/* */
/*                     {% for filterRow in mailAlert.filters %}*/
/*                         {% for key,  filterItem in filterRow %}*/
/*                             <td>*/
/*                                 {{ filterItem.filterField }} {{ filterItem.operator}} {{  filterItem.valueLabbel}}*/
/*                             </td>*/
/*                         {% endfor %}*/
/*                     {% endfor %}*/
/* */
/*                     <td>*/
/*                         <a href="/editmailalert/{{ mailAlert.mailAlertId }}"  class="btn btn-primary btn-sm" role="button">*/
/*                                Edit*/
/*                         </a>*/
/*                     </td>*/
/* */
/*                     <td>*/
/*                         <a href="/deletemailalert/{{ mailAlert.mailAlertId }}"  class="btn btn-danger btn-sm" role="button">*/
/*                                 Delete*/
/*                         </a>*/
/*                     </td>*/
/* */
/*             </tr>*/
/*             {% endfor %}*/
/*     </table>*/
/* {% endblock %}*/
/* */
/* */
