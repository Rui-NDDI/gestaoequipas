<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\CoreExtension;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;
use Twig\TemplateWrapper;

/* modules/contrib/views_aggregator/templates/views-aggregator-results-table.html.twig */
class __TwigTemplate_8092841133ba4a14abccc23da6dc0b1c extends Template
{
    private Source $source;
    /**
     * @var array<string, Template>
     */
    private array $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->extensions[SandboxExtension::class];
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 48
        if ((($tmp = ($context["responsive"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 49
            yield "  <div class=\"table-responsive\">
";
        }
        // line 52
        $context["classes"] = ["table", ("cols-" . Twig\Extension\CoreExtension::length($this->env->getCharset(),         // line 54
($context["header"] ?? null))), (((($tmp =         // line 55
($context["bordered"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("table-bordered") : ("")), (((($tmp =         // line 56
($context["condensed"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("table-condensed") : ("")), (((($tmp =         // line 57
($context["hover"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("table-hover") : ("")), (((($tmp =         // line 58
($context["striped"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("table-striped") : ("")), (((($tmp =         // line 59
($context["responsive"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("responsive-enabled") : ("")), (((($tmp =         // line 60
($context["sticky"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("sticky-enabled") : (""))];
        // line 63
        $context["totals_attributes"] = $this->extensions['Drupal\Core\Template\TwigExtension']->createAttribute();
        // line 64
        yield "<table";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", [($context["classes"] ?? null)], "method", false, false, true, 64), "html", null, true);
        yield ">
  ";
        // line 65
        if ((($tmp = ($context["caption_needed"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 66
            yield "    <caption>
    ";
            // line 67
            if ((($tmp = ($context["caption"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 68
                yield "      ";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["caption"] ?? null), "html", null, true);
                yield "
    ";
            } else {
                // line 70
                yield "      ";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["title"] ?? null), "html", null, true);
                yield "
    ";
            }
            // line 72
            yield "    ";
            if (((!Twig\Extension\CoreExtension::testEmpty(($context["summary"] ?? null))) || (!Twig\Extension\CoreExtension::testEmpty(($context["description"] ?? null))))) {
                // line 73
                yield "      <details>
        ";
                // line 74
                if ((($tmp =  !Twig\Extension\CoreExtension::testEmpty(($context["summary"] ?? null))) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 75
                    yield "          <summary>";
                    yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["summary"] ?? null), "html", null, true);
                    yield "</summary>
        ";
                }
                // line 77
                yield "        ";
                if ((($tmp =  !Twig\Extension\CoreExtension::testEmpty(($context["description"] ?? null))) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 78
                    yield "          ";
                    yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["description"] ?? null), "html", null, true);
                    yield "
        ";
                }
                // line 80
                yield "      </details>
    ";
            }
            // line 82
            yield "    </caption>
  ";
        }
        // line 84
        yield "  ";
        if ((($tmp = ($context["header"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 85
            yield "    <thead>
      <tr>
        ";
            // line 87
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(($context["header"] ?? null));
            foreach ($context['_seq'] as $context["key"] => $context["column"]) {
                // line 88
                yield "          ";
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["column"], "default_classes", [], "any", false, false, true, 88)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 89
                    yield "            ";
                    // line 90
                    $context["column_classes"] = ["views-field", ("views-field-" . (($_v0 =                     // line 92
($context["fields"] ?? null)) && is_array($_v0) || $_v0 instanceof ArrayAccess && in_array($_v0::class, CoreExtension::ARRAY_LIKE_CLASSES, true) ? ($_v0[$context["key"]] ?? null) : CoreExtension::getAttribute($this->env, $this->source, ($context["fields"] ?? null), $context["key"], [], "array", false, false, true, 92)))];
                    // line 95
                    yield "          ";
                }
                // line 96
                yield "          <th";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["column"], "attributes", [], "any", false, false, true, 96), "addClass", [($context["column_classes"] ?? null)], "method", false, false, true, 96), "setAttribute", ["scope", "col"], "method", false, false, true, 96), "html", null, true);
                yield ">";
                // line 97
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["column"], "wrapper_element", [], "any", false, false, true, 97)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 98
                    yield "<";
                    yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["column"], "wrapper_element", [], "any", false, false, true, 98), "html", null, true);
                    yield ">";
                    // line 99
                    if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["column"], "url", [], "any", false, false, true, 99)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                        // line 100
                        yield "<a href=\"";
                        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["column"], "url", [], "any", false, false, true, 100), "html", null, true);
                        yield "\" title=\"";
                        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["column"], "title", [], "any", false, false, true, 100), "html", null, true);
                        yield "\">";
                        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["column"], "content", [], "any", false, false, true, 100), "html", null, true);
                        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["column"], "sort_indicator", [], "any", false, false, true, 100), "html", null, true);
                        yield "</a>";
                    } else {
                        // line 102
                        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["column"], "content", [], "any", false, false, true, 102), "html", null, true);
                        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["column"], "sort_indicator", [], "any", false, false, true, 102), "html", null, true);
                    }
                    // line 104
                    yield "</";
                    yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["column"], "wrapper_element", [], "any", false, false, true, 104), "html", null, true);
                    yield ">";
                } else {
                    // line 106
                    if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["column"], "url", [], "any", false, false, true, 106)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                        // line 107
                        yield "<a href=\"";
                        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["column"], "url", [], "any", false, false, true, 107), "html", null, true);
                        yield "\" title=\"";
                        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["column"], "title", [], "any", false, false, true, 107), "html", null, true);
                        yield "\">";
                        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["column"], "content", [], "any", false, false, true, 107), "html", null, true);
                        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["column"], "sort_indicator", [], "any", false, false, true, 107), "html", null, true);
                        yield "</a>";
                    } else {
                        // line 109
                        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["column"], "content", [], "any", false, false, true, 109), "html", null, true);
                        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["column"], "sort_indicator", [], "any", false, false, true, 109), "html", null, true);
                    }
                }
                // line 112
                yield "</th>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['key'], $context['column'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 114
            yield "      </tr>
      ";
            // line 115
            if ((($context["totals"] ?? null) && CoreExtension::inFilter(($context["totals_row_position"] ?? null), [1, 3]))) {
                // line 116
                yield "        <tr";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["totals_attributes"] ?? null), "addClass", [($context["totals_row_class"] ?? null)], "method", false, false, true, 116), "html", null, true);
                yield ">
          ";
                // line 117
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable(($context["header"] ?? null));
                foreach ($context['_seq'] as $context["key"] => $context["column"]) {
                    // line 118
                    yield "            ";
                    if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["totals"] ?? null), $context["key"], [], "any", false, false, true, 118)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                        // line 119
                        yield "              ";
                        if (((($context["grouping_field"] ?? null) && ($context["grouping_field_class"] ?? null)) && (($context["grouping_field"] ?? null) == $context["key"]))) {
                            // line 120
                            yield "                <td";
                            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["column"], "attributes", [], "any", false, false, true, 120), "addClass", [($context["column_classes"] ?? null)], "method", false, false, true, 120), "addClass", [($context["grouping_field_class"] ?? null)], "method", false, false, true, 120), "html", null, true);
                            yield ">";
                            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["totals"] ?? null), $context["key"], [], "any", false, false, true, 120), "html", null, true);
                            yield "</td>
              ";
                        } else {
                            // line 122
                            yield "                <td";
                            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["column"], "attributes", [], "any", false, false, true, 122), "addClass", [($context["column_classes"] ?? null)], "method", false, false, true, 122), "html", null, true);
                            yield ">";
                            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["totals"] ?? null), $context["key"], [], "any", false, false, true, 122), "html", null, true);
                            yield "</td>
              ";
                        }
                        // line 124
                        yield "            ";
                    } else {
                        // line 125
                        yield "              <td";
                        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["column"], "attributes", [], "any", false, false, true, 125), "addClass", [($context["column_classes"] ?? null)], "method", false, false, true, 125), "html", null, true);
                        yield "></td>
            ";
                    }
                    // line 127
                    yield "          ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['key'], $context['column'], $context['_parent']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 128
                yield "        </tr>
      ";
            }
            // line 130
            yield "    </thead>
  ";
        }
        // line 132
        yield "  <tbody>
    ";
        // line 133
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(($context["rows"] ?? null));
        $context['loop'] = [
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        ];
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["_key"] => $context["row"]) {
            // line 134
            yield "      <tr";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["row"], "attributes", [], "any", false, false, true, 134), "html", null, true);
            yield ">
        ";
            // line 135
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, $context["row"], "columns", [], "any", false, false, true, 135));
            foreach ($context['_seq'] as $context["key"] => $context["column"]) {
                // line 136
                yield "          ";
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["column"], "default_classes", [], "any", false, false, true, 136)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 137
                    yield "            ";
                    // line 138
                    $context["column_classes"] = ["views-field"];
                    // line 142
                    yield "            ";
                    $context['_parent'] = $context;
                    $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, $context["column"], "fields", [], "any", false, false, true, 142));
                    foreach ($context['_seq'] as $context["_key"] => $context["field"]) {
                        // line 143
                        yield "              ";
                        $context["column_classes"] = Twig\Extension\CoreExtension::merge(($context["column_classes"] ?? null), [("views-field-" . $context["field"])]);
                        // line 144
                        yield "                ";
                        if (((($context["grouping_field"] ?? null) && ($context["grouping_field_class"] ?? null)) && (($context["grouping_field"] ?? null) == $context["key"]))) {
                            // line 145
                            yield "                  ";
                            $context["column_classes"] = Twig\Extension\CoreExtension::merge(($context["column_classes"] ?? null), [($context["grouping_field_class"] ?? null)]);
                            // line 146
                            yield "                ";
                        }
                        // line 147
                        yield "            ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_key'], $context['field'], $context['_parent']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 148
                    yield "          ";
                }
                // line 149
                yield "          <td";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["column"], "attributes", [], "any", false, false, true, 149), "addClass", [($context["column_classes"] ?? null)], "method", false, false, true, 149), "html", null, true);
                yield ">";
                // line 150
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["column"], "wrapper_element", [], "any", false, false, true, 150)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 151
                    yield "<";
                    yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["column"], "wrapper_element", [], "any", false, false, true, 151), "html", null, true);
                    yield ">
              ";
                    // line 152
                    $context['_parent'] = $context;
                    $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, $context["column"], "content", [], "any", false, false, true, 152));
                    foreach ($context['_seq'] as $context["_key"] => $context["content"]) {
                        // line 153
                        yield "                ";
                        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["content"], "separator", [], "any", false, false, true, 153), "html", null, true);
                        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["content"], "field_output", [], "any", false, false, true, 153), "html", null, true);
                        yield "
              ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_key'], $context['content'], $context['_parent']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 155
                    yield "              </";
                    yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["column"], "wrapper_element", [], "any", false, false, true, 155), "html", null, true);
                    yield ">";
                } else {
                    // line 157
                    $context['_parent'] = $context;
                    $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, $context["column"], "content", [], "any", false, false, true, 157));
                    foreach ($context['_seq'] as $context["_key"] => $context["content"]) {
                        // line 158
                        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["content"], "separator", [], "any", false, false, true, 158), "html", null, true);
                        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["content"], "field_output", [], "any", false, false, true, 158), "html", null, true);
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_key'], $context['content'], $context['_parent']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                }
                // line 161
                yield "          </td>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['key'], $context['column'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 163
            yield "      </tr>
      ";
            // line 164
            if (CoreExtension::inFilter(CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "index0", [], "any", false, false, true, 164), Twig\Extension\CoreExtension::keys(($context["subtotals"] ?? null)))) {
                // line 165
                yield "        ";
                $context["row_number"] = CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "index0", [], "any", false, false, true, 165);
                // line 166
                yield "        <tr";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["row"], "attributes", [], "any", false, false, true, 166), "addClass", [($context["grouping_row_class"] ?? null)], "method", false, false, true, 166), "html", null, true);
                yield ">
          ";
                // line 167
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable(($context["header"] ?? null));
                foreach ($context['_seq'] as $context["key"] => $context["column"]) {
                    // line 168
                    yield "            ";
                    if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (($_v1 = ($context["subtotals"] ?? null)) && is_array($_v1) || $_v1 instanceof ArrayAccess && in_array($_v1::class, CoreExtension::ARRAY_LIKE_CLASSES, true) ? ($_v1[($context["row_number"] ?? null)] ?? null) : CoreExtension::getAttribute($this->env, $this->source, ($context["subtotals"] ?? null), ($context["row_number"] ?? null), [], "array", false, false, true, 168)), $context["key"], [], "any", false, false, true, 168)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                        // line 169
                        yield "              ";
                        if (((($context["grouping_field"] ?? null) && ($context["grouping_field_class"] ?? null)) && (($context["grouping_field"] ?? null) == $context["key"]))) {
                            // line 170
                            yield "                <td";
                            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["column"], "attributes", [], "any", false, false, true, 170), "addClass", [($context["column_classes"] ?? null)], "method", false, false, true, 170), "addClass", [($context["grouping_field_class"] ?? null)], "method", false, false, true, 170), "html", null, true);
                            yield ">";
                            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, (($_v2 = ($context["subtotals"] ?? null)) && is_array($_v2) || $_v2 instanceof ArrayAccess && in_array($_v2::class, CoreExtension::ARRAY_LIKE_CLASSES, true) ? ($_v2[($context["row_number"] ?? null)] ?? null) : CoreExtension::getAttribute($this->env, $this->source, ($context["subtotals"] ?? null), ($context["row_number"] ?? null), [], "array", false, false, true, 170)), $context["key"], [], "any", false, false, true, 170), "html", null, true);
                            yield "</td>
              ";
                        } else {
                            // line 172
                            yield "                <td";
                            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["column"], "attributes", [], "any", false, false, true, 172), "addClass", [($context["column_classes"] ?? null)], "method", false, false, true, 172), "html", null, true);
                            yield ">";
                            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, (($_v3 = ($context["subtotals"] ?? null)) && is_array($_v3) || $_v3 instanceof ArrayAccess && in_array($_v3::class, CoreExtension::ARRAY_LIKE_CLASSES, true) ? ($_v3[($context["row_number"] ?? null)] ?? null) : CoreExtension::getAttribute($this->env, $this->source, ($context["subtotals"] ?? null), ($context["row_number"] ?? null), [], "array", false, false, true, 172)), $context["key"], [], "any", false, false, true, 172), "html", null, true);
                            yield "</td>
              ";
                        }
                        // line 174
                        yield "            ";
                    } else {
                        // line 175
                        yield "              <td";
                        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["column"], "attributes", [], "any", false, false, true, 175), "addClass", [($context["column_classes"] ?? null)], "method", false, false, true, 175), "html", null, true);
                        yield "></td>
            ";
                    }
                    // line 177
                    yield "          ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['key'], $context['column'], $context['_parent']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 178
                yield "        </tr>
      ";
            }
            // line 180
            yield "    ";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['revindex0'], $context['loop']['revindex'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['row'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 181
        yield "  </tbody>
";
        // line 182
        if ((($context["totals"] ?? null) && CoreExtension::inFilter(($context["totals_row_position"] ?? null), [2, 3]))) {
            // line 183
            yield "  <tfoot>
    <tr";
            // line 184
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["totals_attributes"] ?? null), "addClass", [($context["totals_row_class"] ?? null)], "method", false, false, true, 184), "html", null, true);
            yield ">
    ";
            // line 185
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(($context["header"] ?? null));
            foreach ($context['_seq'] as $context["key"] => $context["column"]) {
                // line 186
                yield "        ";
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["totals"] ?? null), $context["key"], [], "any", false, false, true, 186)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 187
                    yield "          <td";
                    yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["column"], "attributes", [], "any", false, false, true, 187), "addClass", [($context["column_classes"] ?? null)], "method", false, false, true, 187), "html", null, true);
                    yield ">";
                    yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["totals"] ?? null), $context["key"], [], "any", false, false, true, 187), "html", null, true);
                    yield "</td>
        ";
                } else {
                    // line 189
                    yield "          <td";
                    yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["column"], "attributes", [], "any", false, false, true, 189), "addClass", [($context["column_classes"] ?? null)], "method", false, false, true, 189), "html", null, true);
                    yield "></td>
        ";
                }
                // line 191
                yield "    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['key'], $context['column'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 192
            yield "    </tr>
  </tfoot>
";
        }
        // line 195
        yield "</table>
";
        // line 196
        if ((($tmp = ($context["responsive"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 197
            yield "</div>
";
        }
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["responsive", "header", "bordered", "condensed", "hover", "striped", "sticky", "attributes", "caption_needed", "caption", "title", "summary", "description", "fields", "totals", "totals_row_position", "totals_row_class", "grouping_field", "grouping_field_class", "rows", "loop", "subtotals", "grouping_row_class"]);        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "modules/contrib/views_aggregator/templates/views-aggregator-results-table.html.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function isTraitable(): bool
    {
        return false;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo(): array
    {
        return array (  483 => 197,  481 => 196,  478 => 195,  473 => 192,  467 => 191,  461 => 189,  453 => 187,  450 => 186,  446 => 185,  442 => 184,  439 => 183,  437 => 182,  434 => 181,  420 => 180,  416 => 178,  410 => 177,  404 => 175,  401 => 174,  393 => 172,  385 => 170,  382 => 169,  379 => 168,  375 => 167,  370 => 166,  367 => 165,  365 => 164,  362 => 163,  355 => 161,  347 => 158,  343 => 157,  338 => 155,  328 => 153,  324 => 152,  319 => 151,  317 => 150,  313 => 149,  310 => 148,  304 => 147,  301 => 146,  298 => 145,  295 => 144,  292 => 143,  287 => 142,  285 => 138,  283 => 137,  280 => 136,  276 => 135,  271 => 134,  254 => 133,  251 => 132,  247 => 130,  243 => 128,  237 => 127,  231 => 125,  228 => 124,  220 => 122,  212 => 120,  209 => 119,  206 => 118,  202 => 117,  197 => 116,  195 => 115,  192 => 114,  185 => 112,  180 => 109,  170 => 107,  168 => 106,  163 => 104,  159 => 102,  149 => 100,  147 => 99,  143 => 98,  141 => 97,  137 => 96,  134 => 95,  132 => 92,  131 => 90,  129 => 89,  126 => 88,  122 => 87,  118 => 85,  115 => 84,  111 => 82,  107 => 80,  101 => 78,  98 => 77,  92 => 75,  90 => 74,  87 => 73,  84 => 72,  78 => 70,  72 => 68,  70 => 67,  67 => 66,  65 => 65,  60 => 64,  58 => 63,  56 => 60,  55 => 59,  54 => 58,  53 => 57,  52 => 56,  51 => 55,  50 => 54,  49 => 52,  45 => 49,  43 => 48,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "modules/contrib/views_aggregator/templates/views-aggregator-results-table.html.twig", "/var/www/html/modules/contrib/views_aggregator/templates/views-aggregator-results-table.html.twig");
    }
    
    public function ensureSecurityChecked(): void
    {
        if ($this->sandbox->isSandboxed($this->source)) {
            $this->checkSecurity();
        }
    }
    
    public function checkSecurity()
    {
        static $tags = ["if" => 48, "set" => 52, "for" => 87];
        static $filters = ["length" => 54, "escape" => 64, "merge" => 143, "keys" => 164];
        static $functions = ["create_attribute" => 63, "attribute" => 118];

        try {
            $this->sandbox->checkSecurity(
                [0 => "if", 1 => "set", 2 => "for"],
                [0 => "length", 1 => "escape", 2 => "merge", 3 => "keys"],
                [0 => "create_attribute", 1 => "attribute"],
                $this->source
            );
        } catch (SecurityError $e) {
            $e->setSourceContext($this->source);

            if ($e instanceof SecurityNotAllowedTagError && isset($tags[$e->getTagName()])) {
                $e->setTemplateLine($tags[$e->getTagName()]);
            } elseif ($e instanceof SecurityNotAllowedFilterError && isset($filters[$e->getFilterName()])) {
                $e->setTemplateLine($filters[$e->getFilterName()]);
            } elseif ($e instanceof SecurityNotAllowedFunctionError && isset($functions[$e->getFunctionName()])) {
                $e->setTemplateLine($functions[$e->getFunctionName()]);
            }

            throw $e;
        }

    }
}
