<?php

/* frontEnd/systemlist.html.twig */
class __TwigTemplate_be0a87bd4d67327bd0a0a3d0938777885cf248c351b7c3607d0eadd9bb9f7260 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("base.html.twig", "frontEnd/systemlist.html.twig", 1);
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
        $__internal_6fe83b39f6bb4191bade984d56014468dc48edff403be176de42b3b3542642c8 = $this->env->getExtension("native_profiler");
        $__internal_6fe83b39f6bb4191bade984d56014468dc48edff403be176de42b3b3542642c8->enter($__internal_6fe83b39f6bb4191bade984d56014468dc48edff403be176de42b3b3542642c8_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "frontEnd/systemlist.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_6fe83b39f6bb4191bade984d56014468dc48edff403be176de42b3b3542642c8->leave($__internal_6fe83b39f6bb4191bade984d56014468dc48edff403be176de42b3b3542642c8_prof);

    }

    // line 2
    public function block_body($context, array $blocks = array())
    {
        $__internal_ded738275197c84ea4e63c6547a1bc4236a57846e8a8c9fcc7b52e003b949881 = $this->env->getExtension("native_profiler");
        $__internal_ded738275197c84ea4e63c6547a1bc4236a57846e8a8c9fcc7b52e003b949881->enter($__internal_ded738275197c84ea4e63c6547a1bc4236a57846e8a8c9fcc7b52e003b949881_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 3
        echo "
    <p>
        <a href=\"/editsystem/new\" class=\"btn btn-success btn-sm\" role=\"button\" >
            Insert System
        </a>
    </p>

    <table class=\"";
        // line 10
        echo twig_escape_filter($this->env, (isset($context["tableTypeClass"]) ? $context["tableTypeClass"] : $this->getContext($context, "tableTypeClass")), "html", null, true);
        echo "\">
        ";
        // line 11
        $this->loadTemplate("frontEnd/partials/standard/tableHeader.html.twig", "frontEnd/systemlist.html.twig", 11)->display(array("headerItems" => array(0 => "id", 1 => "name", 2 => " ", 3 => " ")));
        // line 14
        echo "
        ";
        // line 15
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["list"]) ? $context["list"] : $this->getContext($context, "list")));
        foreach ($context['_seq'] as $context["_key"] => $context["system"]) {
            // line 16
            echo "            <tr>
                <td>";
            // line 17
            echo twig_escape_filter($this->env, $this->getAttribute($context["system"], "systemid", array()), "html", null, true);
            echo "</td>
                <td>";
            // line 18
            echo twig_escape_filter($this->env, $this->getAttribute($context["system"], "name", array()), "html", null, true);
            echo "</td>
                <td width=\"10%\">
                    <a href=\"/editsystem/";
            // line 20
            echo twig_escape_filter($this->env, $this->getAttribute($context["system"], "systemid", array()), "html", null, true);
            echo "\"  class=\"btn btn-primary btn-sm\" role=\"button\">
                        Edit
                    </a>
                </td>

                <td width=\"10%\">
                    <a href=\"/deletesystem/";
            // line 26
            echo twig_escape_filter($this->env, $this->getAttribute($context["system"], "systemid", array()), "html", null, true);
            echo "\"  class=\"btn btn-danger btn-sm\" role=\"button\">
                        Delete
                    </a>
                </td>

            </tr>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['system'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 33
        echo "    </table>
";
        
        $__internal_ded738275197c84ea4e63c6547a1bc4236a57846e8a8c9fcc7b52e003b949881->leave($__internal_ded738275197c84ea4e63c6547a1bc4236a57846e8a8c9fcc7b52e003b949881_prof);

    }

    public function getTemplateName()
    {
        return "frontEnd/systemlist.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  96 => 33,  83 => 26,  74 => 20,  69 => 18,  65 => 17,  62 => 16,  58 => 15,  55 => 14,  53 => 11,  49 => 10,  40 => 3,  34 => 2,  11 => 1,);
    }
}
/* {% extends 'base.html.twig' %}*/
/* {% block body %}*/
/* */
/*     <p>*/
/*         <a href="/editsystem/new" class="btn btn-success btn-sm" role="button" >*/
/*             Insert System*/
/*         </a>*/
/*     </p>*/
/* */
/*     <table class="{{ tableTypeClass }}">*/
/*         {% include 'frontEnd/partials/standard/tableHeader.html.twig'*/
/*             with {'headerItems': [ 'id' , 'name' , ' ' , ' '] } only*/
/*         %}*/
/* */
/*         {% for system in list %}*/
/*             <tr>*/
/*                 <td>{{ system.systemid }}</td>*/
/*                 <td>{{ system.name }}</td>*/
/*                 <td width="10%">*/
/*                     <a href="/editsystem/{{ system.systemid }}"  class="btn btn-primary btn-sm" role="button">*/
/*                         Edit*/
/*                     </a>*/
/*                 </td>*/
/* */
/*                 <td width="10%">*/
/*                     <a href="/deletesystem/{{ system.systemid }}"  class="btn btn-danger btn-sm" role="button">*/
/*                         Delete*/
/*                     </a>*/
/*                 </td>*/
/* */
/*             </tr>*/
/*         {% endfor %}*/
/*     </table>*/
/* {% endblock %}*/
/* */
/* */
