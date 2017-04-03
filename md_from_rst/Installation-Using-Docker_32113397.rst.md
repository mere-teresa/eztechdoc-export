<div id="page">
<div id="main" class="aui-page-panel">
<div id="main-header">
<div id="breadcrumb-section">
1.  [Developer](index.html)
2.  [Documentation](Documentation_31429504.html)
3.  [Get Started with eZ
    Platform](Get-Started-with-eZ-Platform_31429520.html)
4.  [Step 1: Installation](31429538.html)

</div>
**Developer : Installation Using Docker**

</div>
<div id="content" class="view">
<div class="page-metadata">
Created by André Rømcke, last modified by David Christian Liedle on Nov
16, 2016

</div>
<div id="main-content" class="wiki-content group">
<div class="contentLayout2">
<div class="columnLayout two-right-sidebar"
data-layout="two-right-sidebar">
<div class="cell normal" data-type="normal">
<div class="innerCell">
When our Docker stuff is ready, we’ll have the documentation here.
Meanwhile, follow along with our progress:

<div id="refresh-module-367619781">
<div id="jira-issues-367619781"
style="width: 100%;  overflow: auto;">
+--------+--------+--------+--------+--------+--------+--------+--------+--------+--------+--------+
| T      | Key    | Summar | Assign | Report | P      | Status | Resolu | Create | Update | Due    |
|        |        | y      | ee     | er     |        |        | tion   | d      | d      |        |
+--------+--------+--------+--------+--------+--------+--------+--------+--------+--------+--------+
| [![Sto | EZP-2  | As a   | Unassi | André  | ![High | > Open | Unreso | Jun    | Jun    |        |
| ry](ht | 5871 & | Develo | gned   | Rømcke | ](http |        | lved   | 09,    | 09,    |        |
| tps:// | lt;    | per    |        |        | s://ji |        |        | 2016   | 2016   |        |
| jira.e | https: | I want |        |        | ra.ez. |        |        |        |        |        |
| z.no/i | //jira | to run |        |        | no/ima |        |        |        |        |        |
| mages/ | .ez.no | my eZ  |        |        | ges/ic |        |        |        |        |        |
| icons/ | /brows | Platfo |        |        | ons/pr |        |        |        |        |        |
| issuet | e/EZP- | rm     |        |        | ioriti |        |        |        |        |        |
| ypes/s | 25871? | instal |        |        | es/maj |        |        |        |        |        |
| tory.p | src=co | lation |        |        | or.png |        |        |        |        |        |
| ng){.i | nfmacr | on     |        |        | ){.ico |        |        |        |        |        |
| con}]( | o&gt;\ | Docker |        |        | n}     |        |        |        |        |        |
| https: | _\_    | in a   |        |        |        |        |        |        |        |        |
| //jira |        | cluste |        |        |        |        |        |        |        |        |
| .ez.no |        | r      |        |        |        |        |        |        |        |        |
| /brows |        | server |        |        |        |        |        |        |        |        |
| e/EZP- |        | setup  |        |        |        |        |        |        |        |        |
| 23371? |        | &lt;ht |        |        |        |        |        |        |        |        |
| src=co |        | tps    |        |        |        |        |        |        |        |        |
| nfmacr |        | ://jir |        |        |        |        |        |        |        |        |
| o)     |        | a.ez.n |        |        |        |        |        |        |        |        |
|        |        | o/brow |        |        |        |        |        |        |        |        |
|        |        | se/EZP |        |        |        |        |        |        |        |        |
|        |        | -25871 |        |        |        |        |        |        |        |        |
|        |        | ?src=c |        |        |        |        |        |        |        |        |
|        |        | onfmac |        |        |        |        |        |        |        |        |
|        |        | ro&gt; |        |        |        |        |        |        |        |        |
|        |        | \_\_   |        |        |        |        |        |        |        |        |
+--------+--------+--------+--------+--------+--------+--------+--------+--------+--------+--------+
| [![Sto | EZP-2  | As a   | Unassi | André  | ![High | > Open | Unreso | Jun    | Jun    |        |
| ry](ht | 5870 & | Develo | gned   | Rømcke | ](http |        | lved   | 09,    | 09,    |        |
| tps:// | lt;    | per    |        |        | s://ji |        |        | 2016   | 2016   |        |
| jira.e | https: | I want |        |        | ra.ez. |        |        |        |        |        |
| z.no/i | //jira | to run |        |        | no/ima |        |        |        |        |        |
| mages/ | .ez.no | pre    |        |        | ges/ic |        |        |        |        |        |
| icons/ | /brows | built  |        |        | ons/pr |        |        |        |        |        |
| issuet | e/EZP- | docker |        |        | ioriti |        |        |        |        |        |
| ypes/s | 25870? | image  |        |        | es/maj |        |        |        |        |        |
| tory.p | src=co | of my  |        |        | or.png |        |        |        |        |        |
| ng){.i | nfmacr | eZ     |        |        | ){.ico |        |        |        |        |        |
| con}]( | o&gt;\ | Platfo |        |        | n}     |        |        |        |        |        |
| https: | _\_    | rm     |        |        |        |        |        |        |        |        |
| //jira |        | demo   |        |        |        |        |        |        |        |        |
| .ez.no |        | instal |        |        |        |        |        |        |        |        |
| /brows |        | lation |        |        |        |        |        |        |        |        |
| e/EZP- |        | ,      |        |        |        |        |        |        |        |        |
| 23371? |        | and    |        |        |        |        |        |        |        |        |
| src=co |        | run it |        |        |        |        |        |        |        |        |
| nfmacr |        | in     |        |        |        |        |        |        |        |        |
| o)     |        | single |        |        |        |        |        |        |        |        |
|        |        | server |        |        |        |        |        |        |        |        |
|        |        | setup  |        |        |        |        |        |        |        |        |
|        |        | &lt;ht |        |        |        |        |        |        |        |        |
|        |        | tps    |        |        |        |        |        |        |        |        |
|        |        | ://jir |        |        |        |        |        |        |        |        |
|        |        | a.ez.n |        |        |        |        |        |        |        |        |
|        |        | o/brow |        |        |        |        |        |        |        |        |
|        |        | se/EZP |        |        |        |        |        |        |        |        |
|        |        | -25870 |        |        |        |        |        |        |        |        |
|        |        | ?src=c |        |        |        |        |        |        |        |        |
|        |        | onfmac |        |        |        |        |        |        |        |        |
|        |        | ro&gt; |        |        |        |        |        |        |        |        |
|        |        | \_\_   |        |        |        |        |        |        |        |        |
+--------+--------+--------+--------+--------+--------+--------+--------+--------+--------+--------+
| [![Epi | EZP-2  | Docke  | André  | André  | ![High | > Open | Unreso | Sep    | Feb    |        |
| c](htt | 6310 & | r-Tool | Rømcke | Rømcke | ](http |        | lved   | 14,    | 20,    |        |
| ps://j | lt;    | s      |        |        | s://ji |        |        | 2016   | 2017   |        |
| ira.ez | https: | /      |        |        | ra.ez. |        |        |        |        |        |
| .no/im | //jira | deploy |        |        | no/ima |        |        |        |        |        |
| ages/i | .ez.no | ment   |        |        | ges/ic |        |        |        |        |        |
| cons/i | /brows | M2 -   |        |        | ons/pr |        |        |        |        |        |
| ssuety | e/EZP- | Stabil |        |        | ioriti |        |        |        |        |        |
| pes/ep | 26310? | izing  |        |        | es/maj |        |        |        |        |        |
| ic.png | src=co | &lt;ht |        |        | or.png |        |        |        |        |        |
| ){.ico | nfmacr | tps    |        |        | ){.ico |        |        |        |        |        |
| n}](ht | o&gt;\ | ://jir |        |        | n}     |        |        |        |        |        |
| tps:// | _\_    | a.ez.n |        |        |        |        |        |        |        |        |
| jira.e |        | o/brow |        |        |        |        |        |        |        |        |
| z.no/b |        | se/EZP |        |        |        |        |        |        |        |        |
| rowse/ |        | -26310 |        |        |        |        |        |        |        |        |
| EZP-25 |        | ?src=c |        |        |        |        |        |        |        |        |
| 665?sr |        | onfmac |        |        |        |        |        |        |        |        |
| c=conf |        | ro&gt; |        |        |        |        |        |        |        |        |
| macro) |        | \_\_   |        |        |        |        |        |        |        |        |
+--------+--------+--------+--------+--------+--------+--------+--------+--------+--------+--------+
| [![Epi | EZP-2  | Testi  | Unassi | André  | |Criti | > Open | Unreso | Jun    | Jan    |        |
| c](htt | 5865 & | ng     | gned   | Rømcke | cal|   |        | lved   | 08,    | 17,    |        |
| ps://j | lt;    | infras |        |        |        |        |        | 2016   | 2017   |        |
| ira.ez | https: | tructu |        |        |        |        |        |        |        |        |
| .no/im | //jira | re     |        |        |        |        |        |        |        |        |
| ages/i | .ez.no | update |        |        |        |        |        |        |        |        |
| cons/i | /brows | (CI) & |        |        |        |        |        |        |        |        |
| ssuety | e/EZP- | lt;    |        |        |        |        |        |        |        |        |
| pes/ep | 25865? | https: |        |        |        |        |        |        |        |        |
| ic.png | src=co | //jira |        |        |        |        |        |        |        |        |
| ){.ico | nfmacr | .ez.no |        |        |        |        |        |        |        |        |
| n}](ht | o&gt;\ | /brows |        |        |        |        |        |        |        |        |
| tps:// | _\_    | e/EZP- |        |        |        |        |        |        |        |        |
| jira.e |        | 25865? |        |        |        |        |        |        |        |        |
| z.no/b |        | src=co |        |        |        |        |        |        |        |        |
| rowse/ |        | nfmacr |        |        |        |        |        |        |        |        |
| EZP-25 |        | o&gt;\ |        |        |        |        |        |        |        |        |
| 665?sr |        | _\_    |        |        |        |        |        |        |        |        |
| c=conf |        |        |        |        |        |        |        |        |        |        |
| macro) |        |        |        |        |        |        |        |        |        |        |
+--------+--------+--------+--------+--------+--------+--------+--------+--------+--------+--------+
| [![Bug | EZP-2  | \[Insi | Unassi | Sylvai | ![High | > Open | Unreso | Sep    | Oct    |        |
| ](http | 6286 & | ght\]  | gned   | n      | ](http |        | lved   | 12,    | 26,    |        |
| s://ji | lt;    | YAML   |        | Guitta | s://ji |        |        | 2016   | 2016   |        |
| ra.ez. | https: | files  |        | rd     | ra.ez. |        |        |        |        |        |
| no/ima | //jira | should |        |        | no/ima |        |        |        |        |        |
| ges/ic | .ez.no | not    |        |        | ges/ic |        |        |        |        |        |
| ons/is | /brows | contai |        |        | ons/pr |        |        |        |        |        |
| suetyp | e/EZP- | n      |        |        | ioriti |        |        |        |        |        |
| es/bug | 26286? | syntax |        |        | es/maj |        |        |        |        |        |
| .png){ | src=co | error  |        |        | or.png |        |        |        |        |        |
| .icon} | nfmacr | &lt;ht |        |        | ){.ico |        |        |        |        |        |
| ](http | o&gt;\ | tps    |        |        | n}     |        |        |        |        |        |
| s://ji | _\_    | ://jir |        |        |        |        |        |        |        |        |
| ra.ez. |        | a.ez.n |        |        |        |        |        |        |        |        |
| no/bro |        | o/brow |        |        |        |        |        |        |        |        |
| wse/EZ |        | se/EZP |        |        |        |        |        |        |        |        |
| P-2586 |        | -26286 |        |        |        |        |        |        |        |        |
| 9?src= |        | ?src=c |        |        |        |        |        |        |        |        |
| confma |        | onfmac |        |        |        |        |        |        |        |        |
| cro)   |        | ro&gt; |        |        |        |        |        |        |        |        |
|        |        | \_\_   |        |        |        |        |        |        |        |        |
+--------+--------+--------+--------+--------+--------+--------+--------+--------+--------+--------+
| [![Epi | EZP-2  | Sales  | Unassi | André  | ![High | Closed | Done   | Feb    | Jan    |        |
| c](htt | 4032 & | Demo   | gned   | Rømcke | ](http |        |        | 18,    | 19,    |        |
| ps://j | lt;    | system |        |        | s://ji |        |        | 2015   | 2016   |        |
| ira.ez | https: |  &lt;h |        |        | ra.ez. |        |        |        |        |        |
| .no/im | //jira | ttp    |        |        | no/ima |        |        |        |        |        |
| ages/i | .ez.no | s://ji |        |        | ges/ic |        |        |        |        |        |
| cons/i | /brows | ra.ez. |        |        | ons/pr |        |        |        |        |        |
| ssuety | e/EZP- | no/bro |        |        | ioriti |        |        |        |        |        |
| pes/ep | 24032? | wse/EZ |        |        | es/maj |        |        |        |        |        |
| ic.png | src=co | P-2403 |        |        | or.png |        |        |        |        |        |
| ){.ico | nfmacr | 2?src= |        |        | ){.ico |        |        |        |        |        |
| n}](ht | o&gt;\ | confma |        |        | n}     |        |        |        |        |        |
| tps:// | _\_    | cro&gt |        |        |        |        |        |        |        |        |
| jira.e |        | ;\_    |        |        |        |        |        |        |        |        |
| z.no/b |        | \_     |        |        |        |        |        |        |        |        |
| rowse/ |        |        |        |        |        |        |        |        |        |        |
| EZP-25 |        |        |        |        |        |        |        |        |        |        |
| 665?sr |        |        |        |        |        |        |        |        |        |        |
| c=conf |        |        |        |        |        |        |        |        |        |        |
| macro) |        |        |        |        |        |        |        |        |        |        |
+--------+--------+--------+--------+--------+--------+--------+--------+--------+--------+--------+
| [![Epi | EZP-2  | Docke  | Unassi | Vidar  | ![High | Closed | Fixed  | Jan    | Sep    |        |
| c](htt | 3944 & | r      | gned   | Langse | ](http |        |        | 28,    | 14,    |        |
| ps://j | lt;    | for    |        | id     | s://ji |        |        | 2015   | 2016   |        |
| ira.ez | https: | testin |        |        | ra.ez. |        |        |        |        |        |
| .no/im | //jira | g      |        |        | no/ima |        |        |        |        |        |
| ages/i | .ez.no | needs  |        |        | ges/ic |        |        |        |        |        |
| cons/i | /brows | &lt;ht |        |        | ons/pr |        |        |        |        |        |
| ssuety | e/EZP- | tps    |        |        | ioriti |        |        |        |        |        |
| pes/ep | 23944? | ://jir |        |        | es/maj |        |        |        |        |        |
| ic.png | src=co | a.ez.n |        |        | or.png |        |        |        |        |        |
| ){.ico | nfmacr | o/brow |        |        | ){.ico |        |        |        |        |        |
| n}](ht | o&gt;\ | se/EZP |        |        | n}     |        |        |        |        |        |
| tps:// | _\_    | -23944 |        |        |        |        |        |        |        |        |
| jira.e |        | ?src=c |        |        |        |        |        |        |        |        |
| z.no/b |        | onfmac |        |        |        |        |        |        |        |        |
| rowse/ |        | ro&gt; |        |        |        |        |        |        |        |        |
| EZP-25 |        | \_\_   |        |        |        |        |        |        |        |        |
| 665?sr |        |        |        |        |        |        |        |        |        |        |
| c=conf |        |        |        |        |        |        |        |        |        |        |
| macro) |        |        |        |        |        |        |        |        |        |        |
+--------+--------+--------+--------+--------+--------+--------+--------+--------+--------+--------+
| [![Tas | EZP-2  | Prepa  | Unassi | Vidar  | ![High | Closed | Fixed  | Jan    | Feb    |        |
| k](htt | 3945 & | re     | gned   | Langse | ](http |        |        | 28,    | 24,    |        |
| ps://j | lt;    | contai |        | id     | s://ji |        |        | 2015   | 2015   |        |
| ira.ez | https: | ners   |        |        | ra.ez. |        |        |        |        |        |
| .no/im | //jira | for    |        |        | no/ima |        |        |        |        |        |
| ages/i | .ez.no | new    |        |        | ges/ic |        |        |        |        |        |
| cons/i | /brows | instal |        |        | ons/pr |        |        |        |        |        |
| ssuety | e/EZP- | l      |        |        | ioriti |        |        |        |        |        |
| pes/ta | 23945? | script |        |        | es/maj |        |        |        |        |        |
| sk.png | src=co | (      |        |        | or.png |        |        |        |        |        |
| ){.ico | nfmacr | replac |        |        | ){.ico |        |        |        |        |        |
| n}](ht | o&gt;\ | ement  |        |        | n}     |        |        |        |        |        |
| tps:// | _\_    | of     |        |        |        |        |        |        |        |        |
| jira.e |        | kickst |        |        |        |        |        |        |        |        |
| z.no/b |        | art.in |        |        |        |        |        |        |        |        |
| rowse/ |        | i      |        |        |        |        |        |        |        |        |
| EZP-23 |        | ) &lt; |        |        |        |        |        |        |        |        |
| 942?sr |        | htt    |        |        |        |        |        |        |        |        |
| c=conf |        | ps://j |        |        |        |        |        |        |        |        |
| macro) |        | ira.ez |        |        |        |        |        |        |        |        |
|        |        | .no/br |        |        |        |        |        |        |        |        |
|        |        | owse/E |        |        |        |        |        |        |        |        |
|        |        | ZP-239 |        |        |        |        |        |        |        |        |
|        |        | 45?src |        |        |        |        |        |        |        |        |
|        |        | =confm |        |        |        |        |        |        |        |        |
|        |        | acro&g |        |        |        |        |        |        |        |        |
|        |        | t;     |        |        |        |        |        |        |        |        |
|        |        | \_\_   |        |        |        |        |        |        |        |        |
+--------+--------+--------+--------+--------+--------+--------+--------+--------+--------+--------+
| [![Sto | EZP-2  | As a   | Unassi | André  | ![High | Closed | Fixed  | Jun    | Aug    |        |
| ry](ht | 5868 & | Develo | gned   | Rømcke | ](http |        |        | 09,    | 24,    |        |
| tps:// | lt;    | per    |        |        | s://ji |        |        | 2016   | 2016   |        |
| jira.e | https: | I want |        |        | ra.ez. |        |        |        |        |        |
| z.no/i | //jira | tool   |        |        | no/ima |        |        |        |        |        |
| mages/ | .ez.no | to     |        |        | ges/ic |        |        |        |        |        |
| icons/ | /brows | build  |        |        | ons/pr |        |        |        |        |        |
| issuet | e/EZP- | Docker |        |        | ioriti |        |        |        |        |        |
| ypes/s | 25868? | image  |        |        | es/maj |        |        |        |        |        |
| tory.p | src=co | of my  |        |        | or.png |        |        |        |        |        |
| ng){.i | nfmacr | eZ     |        |        | ){.ico |        |        |        |        |        |
| con}]( | o&gt;\ | Platfo |        |        | n}     |        |        |        |        |        |
| https: | _\_    | rm     |        |        |        |        |        |        |        |        |
| //jira |        | instal |        |        |        |        |        |        |        |        |
| .ez.no |        | lation |        |        |        |        |        |        |        |        |
| /brows |        | ,      |        |        |        |        |        |        |        |        |
| e/EZP- |        | and    |        |        |        |        |        |        |        |        |
| 23371? |        | run it |        |        |        |        |        |        |        |        |
| src=co |        | in     |        |        |        |        |        |        |        |        |
| nfmacr |        | single |        |        |        |        |        |        |        |        |
| o)     |        | server |        |        |        |        |        |        |        |        |
|        |        | setup  |        |        |        |        |        |        |        |        |
|        |        | &lt;ht |        |        |        |        |        |        |        |        |
|        |        | tps    |        |        |        |        |        |        |        |        |
|        |        | ://jir |        |        |        |        |        |        |        |        |
|        |        | a.ez.n |        |        |        |        |        |        |        |        |
|        |        | o/brow |        |        |        |        |        |        |        |        |
|        |        | se/EZP |        |        |        |        |        |        |        |        |
|        |        | -25868 |        |        |        |        |        |        |        |        |
|        |        | ?src=c |        |        |        |        |        |        |        |        |
|        |        | onfmac |        |        |        |        |        |        |        |        |
|        |        | ro&gt; |        |        |        |        |        |        |        |        |
|        |        | \_\_   |        |        |        |        |        |        |        |        |
+--------+--------+--------+--------+--------+--------+--------+--------+--------+--------+--------+
| [![Sto | EZP-2  | As     | Unassi | André  | ![High | Closed | Fixed  | Jun    | Jun    |        |
| ry](ht | 5876 & | Mainta | gned   | Rømcke | ](http |        |        | 13,    | 15,    |        |
| tps:// | lt;    | iner   |        |        | s://ji |        |        | 2016   | 2016   |        |
| jira.e | https: | I want |        |        | ra.ez. |        |        |        |        |        |
| z.no/i | //jira | Behat  |        |        | no/ima |        |        |        |        |        |
| mages/ | .ez.no | tests  |        |        | ges/ic |        |        |        |        |        |
| icons/ | /brows | runnin |        |        | ons/pr |        |        |        |        |        |
| issuet | e/EZP- | g      |        |        | ioriti |        |        |        |        |        |
| ypes/s | 25876? | on     |        |        | es/maj |        |        |        |        |        |
| tory.p | src=co | docker |        |        | or.png |        |        |        |        |        |
| ng){.i | nfmacr | contai |        |        | ){.ico |        |        |        |        |        |
| con}]( | o&gt;\ | ners   |        |        | n}     |        |        |        |        |        |
| https: | _\_    | so I   |        |        |        |        |        |        |        |        |
| //jira |        | can    |        |        |        |        |        |        |        |        |
| .ez.no |        | run    |        |        |        |        |        |        |        |        |
| /brows |        | the    |        |        |        |        |        |        |        |        |
| e/EZP- |        | same   |        |        |        |        |        |        |        |        |
| 23371? |        | setup  |        |        |        |        |        |        |        |        |
| src=co |        | locall |        |        |        |        |        |        |        |        |
| nfmacr |        | y &lt; |        |        |        |        |        |        |        |        |
| o)     |        | htt    |        |        |        |        |        |        |        |        |
|        |        | ps://j |        |        |        |        |        |        |        |        |
|        |        | ira.ez |        |        |        |        |        |        |        |        |
|        |        | .no/br |        |        |        |        |        |        |        |        |
|        |        | owse/E |        |        |        |        |        |        |        |        |
|        |        | ZP-258 |        |        |        |        |        |        |        |        |
|        |        | 76?src |        |        |        |        |        |        |        |        |
|        |        | =confm |        |        |        |        |        |        |        |        |
|        |        | acro&g |        |        |        |        |        |        |        |        |
|        |        | t;     |        |        |        |        |        |        |        |        |
|        |        | \_\_   |        |        |        |        |        |        |        |        |
+--------+--------+--------+--------+--------+--------+--------+--------+--------+--------+--------+
| [![Sto | EZP-2  | Chang  | Unassi | André  | ![High | Closed | Fixed  | Jan    | Feb    |        |
| ry](ht | 5383 & | e      | gned   | Rømcke | ](http |        |        | 14,    | 10,    |        |
| tps:// | lt;    | web    |        |        | s://ji |        |        | 2016   | 2016   |        |
| jira.e | https: | server |        |        | ra.ez. |        |        |        |        |        |
| z.no/i | //jira | conf   |        |        | no/ima |        |        |        |        |        |
| mages/ | .ez.no | to be  |        |        | ges/ic |        |        |        |        |        |
| icons/ | /brows | able   |        |        | ons/pr |        |        |        |        |        |
| issuet | e/EZP- | to     |        |        | ioriti |        |        |        |        |        |
| ypes/s | 25383? | genera |        |        | es/maj |        |        |        |        |        |
| tory.p | src=co | te     |        |        | or.png |        |        |        |        |        |
| ng){.i | nfmacr | from   |        |        | ){.ico |        |        |        |        |        |
| con}]( | o&gt;\ | bash & |        |        | n}     |        |        |        |        |        |
| https: | _\_    | lt;    |        |        |        |        |        |        |        |        |
| //jira |        | https: |        |        |        |        |        |        |        |        |
| .ez.no |        | //jira |        |        |        |        |        |        |        |        |
| /brows |        | .ez.no |        |        |        |        |        |        |        |        |
| e/EZP- |        | /brows |        |        |        |        |        |        |        |        |
| 23371? |        | e/EZP- |        |        |        |        |        |        |        |        |
| src=co |        | 25383? |        |        |        |        |        |        |        |        |
| nfmacr |        | src=co |        |        |        |        |        |        |        |        |
| o)     |        | nfmacr |        |        |        |        |        |        |        |        |
|        |        | o&gt;\ |        |        |        |        |        |        |        |        |
|        |        | _\_    |        |        |        |        |        |        |        |        |
+--------+--------+--------+--------+--------+--------+--------+--------+--------+--------+--------+
| [![Sto | EZP-2  | Port   | Unassi | Vidar  | ![High | Closed | Fixed  | Jan    | Mar    |        |
| ry](ht | 3855 & | ubuntu | gned   | Langse | ](http |        |        | 07,    | 04,    |        |
| tps:// | lt;    | based  |        | id     | s://ji |        |        | 2015   | 2015   |        |
| jira.e | https: | contai |        |        | ra.ez. |        |        |        |        |        |
| z.no/i | //jira | ners   |        |        | no/ima |        |        |        |        |        |
| mages/ | .ez.no | to     |        |        | ges/ic |        |        |        |        |        |
| icons/ | /brows | debian |        |        | ons/pr |        |        |        |        |        |
| issuet | e/EZP- |  &lt;h |        |        | ioriti |        |        |        |        |        |
| ypes/s | 23855? | ttp    |        |        | es/maj |        |        |        |        |        |
| tory.p | src=co | s://ji |        |        | or.png |        |        |        |        |        |
| ng){.i | nfmacr | ra.ez. |        |        | ){.ico |        |        |        |        |        |
| con}]( | o&gt;\ | no/bro |        |        | n}     |        |        |        |        |        |
| https: | _\_    | wse/EZ |        |        |        |        |        |        |        |        |
| //jira |        | P-2385 |        |        |        |        |        |        |        |        |
| .ez.no |        | 5?src= |        |        |        |        |        |        |        |        |
| /brows |        | confma |        |        |        |        |        |        |        |        |
| e/EZP- |        | cro&gt |        |        |        |        |        |        |        |        |
| 23371? |        | ;\_    |        |        |        |        |        |        |        |        |
| src=co |        | \_     |        |        |        |        |        |        |        |        |
| nfmacr |        |        |        |        |        |        |        |        |        |        |
| o)     |        |        |        |        |        |        |        |        |        |        |
+--------+--------+--------+--------+--------+--------+--------+--------+--------+--------+--------+
| [![Sto | EZP-2  | Provi  | Unassi | Vidar  | ![High | Closed | Fixed  | Sep    | Mar    |        |
| ry](ht | 3371 & | sion   | gned   | Langse | ](http |        |        | 24,    | 04,    |        |
| tps:// | lt;    | eZ     |        | id     | s://ji |        |        | 2014   | 2015   |        |
| jira.e | https: | Publis |        |        | ra.ez. |        |        |        |        |        |
| z.no/i | //jira | h      |        |        | no/ima |        |        |        |        |        |
| mages/ | .ez.no | inside |        |        | ges/ic |        |        |        |        |        |
| icons/ | /brows | a      |        |        | ons/pr |        |        |        |        |        |
| issuet | e/EZP- | contai |        |        | ioriti |        |        |        |        |        |
| ypes/s | 23371? | ner &l |        |        | es/maj |        |        |        |        |        |
| tory.p | src=co | t;h    |        |        | or.png |        |        |        |        |        |
| ng){.i | nfmacr | ttps:/ |        |        | ){.ico |        |        |        |        |        |
| con}]( | o&gt;\ | /jira. |        |        | n}     |        |        |        |        |        |
| https: | _\_    | ez.no/ |        |        |        |        |        |        |        |        |
| //jira |        | browse |        |        |        |        |        |        |        |        |
| .ez.no |        | /EZP-2 |        |        |        |        |        |        |        |        |
| /brows |        | 3371?s |        |        |        |        |        |        |        |        |
| e/EZP- |        | rc=con |        |        |        |        |        |        |        |        |
| 23371? |        | fmacro |        |        |        |        |        |        |        |        |
| src=co |        | &gt;\_ |        |        |        |        |        |        |        |        |
| nfmacr |        | \_     |        |        |        |        |        |        |        |        |
| o)     |        |        |        |        |        |        |        |        |        |        |
+--------+--------+--------+--------+--------+--------+--------+--------+--------+--------+--------+
| [![Epi | EZP-2  | Docke  | Unassi | André  | ![High | Closed | Obsole | Apr    | Jan    |        |
| c](htt | 5665 & | r-Tool | gned   | Rømcke | ](http |        | te     | 09,    | 17,    |        |
| ps://j | lt;    | s      |        |        | s://ji |        |        | 2016   | 2017   |        |
| ira.ez | https: | /      |        |        | ra.ez. |        |        |        |        |        |
| .no/im | //jira | deploy |        |        | no/ima |        |        |        |        |        |
| ages/i | .ez.no | ment   |        |        | ges/ic |        |        |        |        |        |
| cons/i | /brows | M1 -   |        |        | ons/pr |        |        |        |        |        |
| ssuety | e/EZP- | beta & |        |        | ioriti |        |        |        |        |        |
| pes/ep | 25665? | lt;    |        |        | es/maj |        |        |        |        |        |
| ic.png | src=co | https: |        |        | or.png |        |        |        |        |        |
| ){.ico | nfmacr | //jira |        |        | ){.ico |        |        |        |        |        |
| n}](ht | o&gt;\ | .ez.no |        |        | n}     |        |        |        |        |        |
| tps:// | _\_    | /brows |        |        |        |        |        |        |        |        |
| jira.e |        | e/EZP- |        |        |        |        |        |        |        |        |
| z.no/b |        | 25665? |        |        |        |        |        |        |        |        |
| rowse/ |        | src=co |        |        |        |        |        |        |        |        |
| EZP-25 |        | nfmacr |        |        |        |        |        |        |        |        |
| 665?sr |        | o&gt;\ |        |        |        |        |        |        |        |        |
| c=conf |        | _\_    |        |        |        |        |        |        |        |        |
| macro) |        |        |        |        |        |        |        |        |        |        |
+--------+--------+--------+--------+--------+--------+--------+--------+--------+--------+--------+
| |Impro | EZP-2  | Add    | Unassi | André  | ![High | Closed | Fixed  | Jun    | Sep    |        |
| vement | 5943 & | Redis  | gned   | Rømcke | ](http |        |        | 23,    | 11,    |        |
| |      | lt;    | suppor |        |        | s://ji |        |        | 2016   | 2016   |        |
|        | https: | t      |        |        | ra.ez. |        |        |        |        |        |
|        | //jira | to     |        |        | no/ima |        |        |        |        |        |
|        | .ez.no | Docker |        |        | ges/ic |        |        |        |        |        |
|        | /brows | -Tools |        |        | ons/pr |        |        |        |        |        |
|        | e/EZP- |  &lt;h |        |        | ioriti |        |        |        |        |        |
|        | 25943? | ttp    |        |        | es/maj |        |        |        |        |        |
|        | src=co | s://ji |        |        | or.png |        |        |        |        |        |
|        | nfmacr | ra.ez. |        |        | ){.ico |        |        |        |        |        |
|        | o&gt;\ | no/bro |        |        | n}     |        |        |        |        |        |
|        | _\_    | wse/EZ |        |        |        |        |        |        |        |        |
|        |        | P-2594 |        |        |        |        |        |        |        |        |
|        |        | 3?src= |        |        |        |        |        |        |        |        |
|        |        | confma |        |        |        |        |        |        |        |        |
|        |        | cro&gt |        |        |        |        |        |        |        |        |
|        |        | ;\_    |        |        |        |        |        |        |        |        |
|        |        | \_     |        |        |        |        |        |        |        |        |
+--------+--------+--------+--------+--------+--------+--------+--------+--------+--------+--------+
| [![Tas | EZP-2  | Add a  | Vidar  | Vidar  | ![High | Backlo | Unreso | Jan    | Jul    |        |
| k](htt | 3942 & | solr   | Langse | Langse | ](http | g      | lved   | 28,    | 21,    |        |
| ps://j | lt;    | contai | id     | id     | s://ji |        |        | 2015   | 2015   |        |
| ira.ez | https: | ner    |        |        | ra.ez. |        |        |        |        |        |
| .no/im | //jira | and    |        |        | no/ima |        |        |        |        |        |
| ages/i | .ez.no | config |        |        | ges/ic |        |        |        |        |        |
| cons/i | /brows | ure    |        |        | ons/pr |        |        |        |        |        |
| ssuety | e/EZP- | ezp to |        |        | ioriti |        |        |        |        |        |
| pes/ta | 23942? | use    |        |        | es/maj |        |        |        |        |        |
| sk.png | src=co | legacy |        |        | or.png |        |        |        |        |        |
| ){.ico | nfmacr | \\\_so |        |        | ){.ico |        |        |        |        |        |
| n}](ht | o&gt;\ | lr     |        |        | n}     |        |        |        |        |        |
| tps:// | _\_    |  &lt;h |        |        |        |        |        |        |        |        |
| jira.e |        | ttp    |        |        |        |        |        |        |        |        |
| z.no/b |        | s://ji |        |        |        |        |        |        |        |        |
| rowse/ |        | ra.ez. |        |        |        |        |        |        |        |        |
| EZP-23 |        | no/bro |        |        |        |        |        |        |        |        |
| 942?sr |        | wse/EZ |        |        |        |        |        |        |        |        |
| c=conf |        | P-2394 |        |        |        |        |        |        |        |        |
| macro) |        | 2?src= |        |        |        |        |        |        |        |        |
|        |        | confma |        |        |        |        |        |        |        |        |
|        |        | cro&gt |        |        |        |        |        |        |        |        |
|        |        | ;\_    |        |        |        |        |        |        |        |        |
|        |        | \_     |        |        |        |        |        |        |        |        |
+--------+--------+--------+--------+--------+--------+--------+--------+--------+--------+--------+
| [![Bug | EZP-2  | Docke  | Unassi | André  | ![High | Backlo | Unreso | Jun    | Oct    |        |
| ](http | 5869 & | r      | gned   | Rømcke | ](http | g      | lved   | 09,    | 24,    |        |
| s://ji | lt;    | contai |        |        | s://ji |        |        | 2016   | 2016   |        |
| ra.ez. | https: | ners   |        |        | ra.ez. |        |        |        |        |        |
| no/ima | //jira | has    |        |        | no/ima |        |        |        |        |        |
| ges/ic | .ez.no | extrem |        |        | ges/ic |        |        |        |        |        |
| ons/is | /brows | ely    |        |        | ons/pr |        |        |        |        |        |
| suetyp | e/EZP- | slow   |        |        | ioriti |        |        |        |        |        |
| es/bug | 25869? | IO on  |        |        | es/maj |        |        |        |        |        |
| .png){ | src=co | Mac/Wi |        |        | or.png |        |        |        |        |        |
| .icon} | nfmacr | ndows  |        |        | ){.ico |        |        |        |        |        |
| ](http | o&gt;\ | under  |        |        | n}     |        |        |        |        |        |
| s://ji | _\_    | develo |        |        |        |        |        |        |        |        |
| ra.ez. |        | pment  |        |        |        |        |        |        |        |        |
| no/bro |        | use &l |        |        |        |        |        |        |        |        |
| wse/EZ |        | t;h    |        |        |        |        |        |        |        |        |
| P-2586 |        | ttps:/ |        |        |        |        |        |        |        |        |
| 9?src= |        | /jira. |        |        |        |        |        |        |        |        |
| confma |        | ez.no/ |        |        |        |        |        |        |        |        |
| cro)   |        | browse |        |        |        |        |        |        |        |        |
|        |        | /EZP-2 |        |        |        |        |        |        |        |        |
|        |        | 5869?s |        |        |        |        |        |        |        |        |
|        |        | rc=con |        |        |        |        |        |        |        |        |
|        |        | fmacro |        |        |        |        |        |        |        |        |
|        |        | &gt;\_ |        |        |        |        |        |        |        |        |
|        |        | \_     |        |        |        |        |        |        |        |        |
+--------+--------+--------+--------+--------+--------+--------+--------+--------+--------+--------+

</div>
<div class="refresh-issues-bottom">
> \`17

issues
&lt;<https://jira.ez.no/secure/IssueNavigator.jspa?reset=true&jqlQuery=component+%3D+%22Deployment+%3E+Docker+Containers%22+AND+project+%3D+EZP+ORDER+BY+status+ASC&src=confmacro>&gt;\_\_

.. raw:: html

   &lt;/div&gt;

.. raw:: html

   &lt;/div&gt;

.. raw:: html

   &lt;/div&gt;

.. raw:: html

   &lt;/div&gt;

.. raw:: html

   &lt;div class="cell aside" data-type="aside"&gt;

.. raw:: html

   &lt;div class="innerCell"&gt;

 

.. raw:: html

   &lt;/div&gt;

.. raw:: html

   &lt;/div&gt;

.. raw:: html

   &lt;/div&gt;

.. raw:: html

   &lt;/div&gt;

.. raw:: html

   &lt;/div&gt;

.. raw:: html

   &lt;/div&gt;

.. raw:: html

   &lt;/div&gt;

.. raw:: html

   &lt;div id="footer" role="contentinfo"&gt;

.. raw:: html

   &lt;div class="section footer-body"&gt;

Document generated by Confluence on Mar 24, 2017 17:19

.. raw:: html

   &lt;div id="footer-logo"&gt;

Atlassian &lt;<http://www.atlassian.com/>&gt;\`\_\_

</div>
</div>
</div>
</div>

