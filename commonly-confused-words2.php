<?php 
include('header.php');


$sql = "select word, mean from x_".$lang." where word in ('accept','except','access','excess','adapt','adept','adopt','advice','advise','affect','effect','ascent','assent','admit','confess','addicted','devoted','assay','essay','altar','alter','bag','beg','bad','bed','bat','bet','beat','bit','berth','birth','beside','besides','calendar','calender','check','cheque','cite','site','sight','coarse','course','corps','corpse','childish','childlike','council','counsel','clean','clear','custom','costume','coma','comma','canon','cannon','dear','deer','drown','sink','disease','decease','dairy','diary','die','dye','discover','invent','deny','refuse','draft','draught','drought','eligible','illegible','eminent','imminent','expect','hope','far','fur','fair','fare','farm','firm','flower','flour','farther','further','fast','first','flash','flesh','gaol','goal','hear','listen','human','humane','hard','herd','hail','hale','honorary','honourable','historic','historical','industrious','industrial','jealous','zealous','later','latter','last','latest','leave','live','lovable','lovely','lose','loose','meat','meet','main','mane','moral','morale','official','officious','ordinance','ordnance','pan','pen','pat','pet','peace','piece','paper','pepper','person','parson','populous','popular','pair','pare','patrol','petrol','personal','physic','physique','pity','piety','practice','practise','pray','prey','quiet','quite','refuge','register','registrar','role','roll','seat','sit','see','sea','sweat','sweet','sale','sell','soul','sole','staff','stuff','story','storey','sometime','sometimes','stationary','stationery','ship','sheep','social','sociable','tale','tell','tail','test','taste','urban','urbane','vain','vein','wander','wonder','weak','week','wick','wear','wire') limit 198";

$x_lang_query = mysqli_query($conn, $sql);

while($row = mysqli_fetch_assoc($x_lang_query)){
	$x_lang_array[$row['word']] = $row['mean'];
}

?>
<style>
.box_wrapper fieldset .fieldset_body span {float: none !important;}
.inner_details span { border-bottom: none !important; }
</style>
                <!--Specific Page Content-->
                <div class="box_wrapper">
				
					<div><a href="<?=$base_url?>/commonly-confused-words.php" title="commonly confused words"><img src="<?=$base_url?>/banners/commonly-confused-words.png" alt="commonly confused words" style="width:100%" /></a></div>

				
                    <fieldset>
                        <legend>Commonly Confused Words</legend>
						
                        <div class="fieldset_body inner_details">
                             
<p><strong>A</strong></p>
<p><strong>Accept</strong><span style="font-weight: 400;"> (<?=$x_lang_array['accept']?>) - I gladly </span><strong>accepted</strong><span style="font-weight: 400;"> her invitation.</span></p>
<p><strong>Except</strong><span style="font-weight: 400;"> (<?=$x_lang_array['accept']?>) - </span><strong>Except</strong><span style="font-weight: 400;"> Oveget, I will not attend her cultural function.</span></p>
<hr />
<p><strong>Access</strong><span style="font-weight: 400;"> (<?=$x_lang_array['access']?>) - The class caption has free </span><strong>access</strong><span style="font-weight: 400;"> to the Headmaster.</span></p>
<p><strong>Excess</strong><span style="font-weight: 400;"> (<?=$x_lang_array['excess']?>) - </span><strong>Excess</strong><span style="font-weight: 400;"> of everything is bad.</span></p>
<hr />
<p><strong>Adapt</strong><span style="font-weight: 400;"> (<?=$x_lang_array['adapt']?>) -He </span><strong>adapted</strong><span style="font-weight: 400;"> himself to the new school.</span></p>
<p><strong>Adept</strong><span style="font-weight: 400;"> (<?=$x_lang_array['adept']?>) - He is </span><strong>adept</strong><span style="font-weight: 400;"> in Nazrul song.</span></p>
<p><strong>Adopt</strong><span style="font-weight: 400;"> (<?=$x_lang_array['adopt']?>) - Don't </span><strong>adopt</strong><span style="font-weight: 400;"> unfair means in the examination.</span></p>
<hr />
<p><strong>Advice</strong><span style="font-weight: 400;"> (<?=$x_lang_array['advice']?>) - Last night My father gave me a good </span><strong>advice</strong><span style="font-weight: 400;">.</span></p>
<p><strong>Advise</strong><span style="font-weight: 400;"> (<?=$x_lang_array['advise']?>) - My all well wishers </span><strong>advised</strong><span style="font-weight: 400;"> me to go through a book.</span></p>
<hr />
<p><strong>Affect</strong><span style="font-weight: 400;"> (<?=$x_lang_array['affect']?>) - Excess labor must </span><strong>affect</strong><span style="font-weight: 400;"> your body.</span></p>
<p><strong>Effect</strong><span style="font-weight: 400;"> (<?=$x_lang_array['effect']?>) - The </span><strong>effects</strong><span style="font-weight: 400;"> of war are not good.</span></p>
<hr />
<p><strong>Ascent</strong><span style="font-weight: 400;"> (<?=$x_lang_array['ascent']?>) - The </span><strong>ascent</strong><span style="font-weight: 400;"> to the mountain is not a easy task.</span></p>
<p><strong>Assent</strong><span style="font-weight: 400;"> (<?=$x_lang_array['assent']?>) - I need your </span><strong>assent</strong><span style="font-weight: 400;"> regarding this matter.</span></p>
<hr />
<p><strong>Admit</strong><span style="font-weight: 400;"> (<?=$x_lang_array['admit']?>) - Mukul </span><strong>admits</strong><span style="font-weight: 400;"> that he was wrong.</span></p>
<p><strong>Confess</strong><span style="font-weight: 400;"> (<?=$x_lang_array['confess']?>) - You must </span><strong>confess</strong><span style="font-weight: 400;"> your fault.</span></p>
<hr />
<p><strong>Addicted</strong><span style="font-weight: 400;"> (<?=$x_lang_array['addicted']?>) - Mukul is </span><strong>addicted</strong><span style="font-weight: 400;"> to drinking.</span></p>
<p><strong>Devoted</strong><span style="font-weight: 400;"> (<?=$x_lang_array['devoted']?>) - Munir is </span><strong>devoted</strong><span style="font-weight: 400;"> to all newspaper technical support.</span></p>
<hr />
<p><strong>Assay</strong><span style="font-weight: 400;"> (<?=$x_lang_array['assay']?>) - Plabon always </span><strong>assays</strong><span style="font-weight: 400;"> to help others.</span></p>
<p><strong>Essay</strong><span style="font-weight: 400;"> (<?=$x_lang_array['essay']?>) - I am writing an </span><strong>essay</strong><span style="font-weight: 400;"> on discipline.</span></p>
<hr />
<p><strong>Altar</strong><span style="font-weight: 400;"> (<?=$x_lang_array['altar']?>) - The goat was sacrificed on the </span><strong>altar</strong><span style="font-weight: 400;">.</span></p>
<p><strong>Alter</strong><span style="font-weight: 400;"> (<?=$x_lang_array['alter']?>) - Nothing is left in this city to be </span><strong>altered</strong><span style="font-weight: 400;">.</span></p>
<hr />
<p><strong>B</strong></p>
<p><strong>Bag</strong><span style="font-weight: 400;"> (<?=$x_lang_array['bag']?>) - Hafez has a wonderful laptop </span><strong>bag</strong><span style="font-weight: 400;">.</span></p>
<p><strong>Beg</strong><span style="font-weight: 400;"> (<?=$x_lang_array['beg']?>) - The older man is </span><strong>begging</strong><span style="font-weight: 400;"> from door to door.</span></p>
<hr />
<p><strong>Bad</strong><span style="font-weight: 400;"> (<?=$x_lang_array['bad']?>) - Never try to mingle with the </span><strong>bad</strong><span style="font-weight: 400;"> boys.</span></p>
<p><strong>Bed</strong><span style="font-weight: 400;"> (<?=$x_lang_array['bed']?>) - I must go to the bed as I feel </span><strong>sleepy</strong><span style="font-weight: 400;">.</span></p>
<hr />
<p><strong>Bat</strong><span style="font-weight: 400;"> (<?=$x_lang_array['bat']?>) - </span><strong>Bats</strong><span style="font-weight: 400;"> do not lay eggs.</span></p>
<p><strong>Bet</strong><span style="font-weight: 400;"> (<?=$x_lang_array['bet']?>) - I </span><strong>bet</strong><span style="font-weight: 400;">, You will lose the match.</span></p>
<hr />
<p><strong>Beat</strong><span style="font-weight: 400;"> (<?=$x_lang_array['beat']?>) - They will </span><strong>beat</strong><span style="font-weight: 400;"> the thief.</span></p>
<p><strong>Bit</strong><span style="font-weight: 400;"> (<?=$x_lang_array['bit']?>) - Mukul ate every </span><strong>bit</strong><span style="font-weight: 400;"> of his cake.</span></p>
<hr />
<p><strong>Berth</strong><span style="font-weight: 400;"> (<?=$x_lang_array['berth']?>) - Poor people can not reserve a </span><strong>berth</strong><span style="font-weight: 400;"> in the train.</span></p>
<p><strong>Birth</strong><span style="font-weight: 400;"> (<?=$x_lang_array['birth']?>) - The cow gave </span><strong>birth</strong><span style="font-weight: 400;"> to a culf yesterday.</span></p>
<hr />
<p><strong>Beside</strong><span style="font-weight: 400;"> (<?=$x_lang_array['beside']?>) - His house is </span><strong>beside</strong><span style="font-weight: 400;"> the field.</span></p>
<p><strong>Besides</strong><span style="font-weight: 400;"> (<?=$x_lang_array['besides']?>) - </span><strong>Besides</strong><span style="font-weight: 400;"> this , He has plenty of wealth.</span></p>
<p><strong>C</strong></p>
<p><strong>Calendar</strong><span style="font-weight: 400;"> (<?=$x_lang_array['calendar']?>) - I gave him a </span><strong>calendar</strong><span style="font-weight: 400;"> of 2014.</span></p>
<p><strong>Calender</strong><span style="font-weight: 400;"> (<?=$x_lang_array['calender']?>) - Every washerman has a </span><strong>calender</strong><span style="font-weight: 400;">.</span></p>
<hr />
<p><strong>Check</strong><span style="font-weight: 400;"> (<?=$x_lang_array['check']?>) - Check your </span><strong>temper</strong><span style="font-weight: 400;">.</span></p>
<p><strong>Cheque</strong><span style="font-weight: 400;"> (<?=$x_lang_array['cheque']?>) - I gave him a </span><strong>cheque</strong><span style="font-weight: 400;"> of TK. 500.</span></p>
<hr />
<p><strong>Cite</strong><span style="font-weight: 400;"> (<?=$x_lang_array['cite']?>) - </span><strong>Cite</strong><span style="font-weight: 400;"> an example.</span></p>
<p><strong>Site</strong><span style="font-weight: 400;"> (<?=$x_lang_array['site']?>) - This is the new </span><strong>site</strong><span style="font-weight: 400;"> of our school.</span></p>
<p><strong>Sight</strong><span style="font-weight: 400;"> (<?=$x_lang_array['sight']?>) - Her eye-</span><strong>sight</strong><span style="font-weight: 400;"> is defective.</span></p>
<hr />
<p><strong>Coarse</strong><span style="font-weight: 400;"> (<?=$x_lang_array['coarse']?>) - She can not eat </span><strong>coarse</strong><span style="font-weight: 400;"> rice.</span></p>
<p><strong>Course</strong><span style="font-weight: 400;"> (<?=$x_lang_array['course']?>) - The ship has changed his </span><strong>course</strong><span style="font-weight: 400;">.</span></p>
<hr />
<p><strong>Corps</strong><span style="font-weight: 400;"> (<?=$x_lang_array['corps']?>) - A </span><strong>corps</strong><span style="font-weight: 400;"> of soldiers was sent to the flood affected area.</span></p>
<p><strong>Corpse</strong><span style="font-weight: 400;"> (<?=$x_lang_array['corpse']?>) - A </span><strong>corpse</strong><span style="font-weight: 400;"> is lying by the road.</span></p>
<hr />
<p><strong>Childish</strong><span style="font-weight: 400;"> (<?=$x_lang_array['childish']?>) - I don't like your </span><strong>childish</strong><span style="font-weight: 400;"> manners.</span></p>
<p><strong>Childlike</strong><span style="font-weight: 400;"> (<?=$x_lang_array['childlike']?>) - He is liked by everybody for his </span><strong>childlike</strong><span style="font-weight: 400;"> simplicity.</span></p>
<hr />
<p><strong>Council</strong><span style="font-weight: 400;"> (<?=$x_lang_array['council']?>) - Ramih is the new chairman of the Union </span><strong>council</strong><span style="font-weight: 400;">.</span></p>
<p><strong>Counsel</strong><span style="font-weight: 400;"> (<?=$x_lang_array['counsel']?>) - My teacher gave a good </span><strong>counsel</strong><span style="font-weight: 400;">.</span></p>
<hr />
<p><strong>Clean</strong><span style="font-weight: 400;"> (<?=$x_lang_array['clean']?>) - The room is </span><strong>clean</strong><span style="font-weight: 400;">.</span></p>
<p><strong>Clear</strong><span style="font-weight: 400;"> (<?=$x_lang_array['clear']?>) - The water is </span><strong>clear</strong><span style="font-weight: 400;">.</span></p>
<hr />
<p><strong>Custom</strong><span style="font-weight: 400;"> (<?=$x_lang_array['custom']?>) - The </span><strong>custom</strong><span style="font-weight: 400;"> is no longer in vogue.</span></p>
<p><strong>Costume</strong><span style="font-weight: 400;"> (<?=$x_lang_array['costume']?>) - You should not wear fancy </span><strong>costume</strong><span style="font-weight: 400;">.</span></p>
<hr />
<p><strong>Coma</strong><span style="font-weight: 400;"> (<?=$x_lang_array['coma']?>) - My wife in a </span><strong>coma</strong><span style="font-weight: 400;">.</span></p>
<p><strong>Comma</strong><span style="font-weight: 400;"> (<?=$x_lang_array['comma']?>) - Put a </span><strong>comma (.)</strong><span style="font-weight: 400;"> after the verb.</span></p>
<hr />
<p><strong>Canon</strong><span style="font-weight: 400;"> (<?=$x_lang_array['canon']?>) - A society has its own </span><strong>canons</strong><span style="font-weight: 400;">.</span></p>
<p><strong>Cannon</strong><span style="font-weight: 400;"> (<?=$x_lang_array['cannon']?>) - The soldiers use </span><strong>cannons</strong><span style="font-weight: 400;"> in the battle field.</span></p>
<p><strong>D</strong></p>
<p><strong>Dear</strong><span style="font-weight: 400;"> (<?=$x_lang_array['dear']?>) - My father is </span><strong>dear</strong><span style="font-weight: 400;"> to me.</span></p>
<p><strong>Deer</strong><span style="font-weight: 400;"> (<?=$x_lang_array['deer']?>) - There are many </span><strong>deer</strong><span style="font-weight: 400;"> in the Sundarbans.</span></p>
<hr />
<p><strong>Drown</strong><span style="font-weight: 400;"> (<?=$x_lang_array['drown']?>) - The boy was </span><strong>drowned</strong><span style="font-weight: 400;"> in the river.</span></p>
<p><strong>Sink</strong><span style="font-weight: 400;"> (<?=$x_lang_array['sink']?>) - The boat </span><strong>sank</strong><span style="font-weight: 400;"> in the river.</span></p>
<hr />
<p><strong>Disease</strong><span style="font-weight: 400;"> (<?=$x_lang_array['disease']?>) - He is suffering from skin </span><strong>disease</strong><span style="font-weight: 400;">.</span></p>
<p><strong>Decease</strong><span style="font-weight: 400;"> (<?=$x_lang_array['decease']?>) - Do you know the time of your </span><strong>decease</strong><span style="font-weight: 400;"> ?.</span></p>
<hr />
<p><strong>Dairy</strong><span style="font-weight: 400;"> (<?=$x_lang_array['dairy']?>) - Have you ever visited the Sirajgonj </span><strong>dairy</strong><span style="font-weight: 400;"> farm.</span></p>
<p><strong>Diary</strong><span style="font-weight: 400;"> (<?=$x_lang_array['diary']?>) - It is good to keep a </span><strong>diary</strong><span style="font-weight: 400;">.</span></p>
<hr />
<p><strong>Die</strong><span style="font-weight: 400;"> (<?=$x_lang_array['die']?>) - He died of </span><strong>fever</strong><span style="font-weight: 400;">.</span></p>
<p><strong>Dye</strong><span style="font-weight: 400;"> (<?=$x_lang_array['dye']?>) - The cloth is </span><strong>dyed</strong><span style="font-weight: 400;"> in fast colour.</span></p>
<hr />
<p><strong>Discover</strong><span style="font-weight: 400;"> (<?=$x_lang_array['discover']?>) - Columbus discovered America </span><strong>fever</strong><span style="font-weight: 400;">.</span></p>
<p><strong>Invent</strong><span style="font-weight: 400;"> (<?=$x_lang_array['invent']?>) - Charle's Babbage </span><strong>invented</strong><span style="font-weight: 400;"> the computer.</span></p>
<hr />
<p><strong>Deny</strong><span style="font-weight: 400;"> (<?=$x_lang_array['deny']?>) - Simu </span><strong>denied</strong><span style="font-weight: 400;"> all charges against her.</span></p>
<p><strong>Refuse</strong><span style="font-weight: 400;"> (<?=$x_lang_array['refuse']?>) - The servant </span><strong>refused</strong><span style="font-weight: 400;"> to obey his orders.</span></p>
<hr />
<p><strong>Draft</strong><span style="font-weight: 400;"> (<?=$x_lang_array['draft']?>) - Make a </span><strong>draft</strong><span style="font-weight: 400;"> of the petition.</span></p>
<p><strong>Draught</strong><span style="font-weight: 400;"> (<?=$x_lang_array['draught']?>) - He drank the water of the glass at one </span><strong>draught</strong><span style="font-weight: 400;">.</span></p>
<p><strong>Drought</strong><span style="font-weight: 400;"> (<?=$x_lang_array['drought']?>) - </span><strong>Drought</strong><span style="font-weight: 400;"> destroyed the crops.</span></p>
<p><strong>E</strong></p>
<p><strong>Eligible</strong><span style="font-weight: 400;"> (<?=$x_lang_array['eligible']?>) - He is not </span><strong>eligible</strong><span style="font-weight: 400;"> for the post.</span></p>
<p><strong>Illegible</strong><span style="font-weight: 400;"> (<?=$x_lang_array['illegible']?>) - Your handwriting is </span><strong>illegible</strong><span style="font-weight: 400;">.</span></p>
<hr />
<p><strong>Eminent</strong><span style="font-weight: 400;"> (<?=$x_lang_array['eminent']?>) - Dr. Haque is an </span><strong>eminent</strong><span style="font-weight: 400;"> scholar.</span></p>
<p><strong>Imminent</strong><span style="font-weight: 400;"> (<?=$x_lang_array['imminent']?>) - I saved him from an </span><strong>imminent</strong><span style="font-weight: 400;"> danger.</span></p>
<hr />
<p><strong>Expect</strong><span style="font-weight: 400;"> (<?=$x_lang_array['expect']?>) - I </span><strong>expect</strong><span style="font-weight: 400;"> that he will pass.</span></p>
<p><strong>Hope</strong><span style="font-weight: 400;"> (<?=$x_lang_array['hope']?>) - I </span><strong>hope</strong><span style="font-weight: 400;"> you are well today.</span></p>
<p><strong>F</strong></p>
<p><strong>Far</strong><span style="font-weight: 400;"> (<?=$x_lang_array['far']?>) - The market is not </span><strong>far</strong><span style="font-weight: 400;"> from the village.</span></p>
<p><strong>Fur</strong><span style="font-weight: 400;"> (<?=$x_lang_array['fur']?>) - The cat has soft </span><strong>fur</strong><span style="font-weight: 400;"> all over it's body.</span></p>
<hr />
<p><strong>Fair</strong><span style="font-weight: 400;"> (<?=$x_lang_array['fair']?>) - She is a </span><strong>fair</strong><span style="font-weight: 400;"> girl.</span></p>
<p><strong>Fare</strong><span style="font-weight: 400;"> (<?=$x_lang_array['fare']?>) - What is the bus </span><strong>fair</strong><span style="font-weight: 400;"> from Dhaka to Sirajgonj?</span></p>
<hr />
<p><strong>Farm</strong><span style="font-weight: 400;"> (<?=$x_lang_array['farm']?>) - There is an agricultural </span><strong>farm</strong><span style="font-weight: 400;"> at Gazipur.</span></p>
<p><strong>Firm</strong><span style="font-weight: 400;"> (<?=$x_lang_array['firm']?>) - He is a </span><strong>firm</strong><span style="font-weight: 400;"> in his ideas.</span></p>
<hr />
<p><strong>Flower</strong><span style="font-weight: 400;"> (<?=$x_lang_array['flower']?>) - Everybody likes </span><strong>flower</strong><span style="font-weight: 400;">.</span></p>
<p><strong>Flour</strong><span style="font-weight: 400;"> (<?=$x_lang_array['flour']?>) - Bread is made with </span><strong>flour</strong><span style="font-weight: 400;">.</span></p>
<hr />
<p><strong>Farther</strong><span style="font-weight: 400;"> (<?=$x_lang_array['farther']?>) - They will go </span><strong>farther</strong><span style="font-weight: 400;"> than expected.</span></p>
<p><strong>Further</strong><span style="font-weight: 400;"> (<?=$x_lang_array['further']?>) - </span><strong>Further</strong><span style="font-weight: 400;"> explanation is necessary to solve this problem.</span></p>
<hr />
<p><strong>Fast</strong><span style="font-weight: 400;"> (<?=$x_lang_array['fast']?>) - The horse runs </span><strong>fast</strong><span style="font-weight: 400;">.</span></p>
<p><strong>First</strong><span style="font-weight: 400;"> (<?=$x_lang_array['first']?>) - Faridul is the </span><strong>first</strong><span style="font-weight: 400;"> boy.</span></p>
<hr />
<p><strong>Flash</strong><span style="font-weight: 400;"> (<?=$x_lang_array['flash']?>) - I saw a </span><strong>flash</strong><span style="font-weight: 400;"> of lightning in the sky.</span></p>
<p><strong>Flesh</strong><span style="font-weight: 400;"> (<?=$x_lang_array['flesh']?>) - Tigers are </span><strong>flesh</strong><span style="font-weight: 400;"> eating animals.</span></p>
<p><strong>G</strong></p>
<p><strong>Gaol</strong><span style="font-weight: 400;"> (<?=$x_lang_array['gaol']?>) - The thief was sent to the </span><strong>gaol</strong><span style="font-weight: 400;">.</span></p>
<p><strong>Goal</strong><span style="font-weight: 400;"> (<?=$x_lang_array['goal']?>) - What is the </span><strong>goal</strong><span style="font-weight: 400;"> of your life?</span></p>
<p><strong>H</strong></p>
<p><strong>Hear</strong><span style="font-weight: 400;"> (<?=$x_lang_array['hear']?>) - I can not </span><strong>hear</strong><span style="font-weight: 400;"> your voice.</span></p>
<p><strong>Listen</strong><span style="font-weight: 400;"> (<?=$x_lang_array['listen']?>) - </span><strong>Listen</strong><span style="font-weight: 400;"> to what i say.</span></p>
<hr />
<p><strong>Human</strong><span style="font-weight: 400;"> (<?=$x_lang_array['human']?>) - To err is </span><strong>human</strong><span style="font-weight: 400;">.</span></p>
<p><strong>Humane</strong><span style="font-weight: 400;"> (<?=$x_lang_array['humane']?>) - He is </span><strong>humane</strong><span style="font-weight: 400;"> by nature.</span></p>
<hr />
<p><strong>Hard</strong><span style="font-weight: 400;"> (<?=$x_lang_array['hard']?>) - He works </span><strong>hard</strong><span style="font-weight: 400;">.</span></p>
<p><strong>Herd</strong><span style="font-weight: 400;"> (<?=$x_lang_array['herd']?>) - A </span><strong>herd</strong><span style="font-weight: 400;"> of sheep is grazing in the field.</span></p>
<hr />
<p><strong>Hail</strong><span style="font-weight: 400;"> (<?=$x_lang_array['hail']?>) - The captain was </span><strong>hailed</strong><span style="font-weight: 400;"> by all.</span></p>
<p><strong>Hale</strong><span style="font-weight: 400;"> (<?=$x_lang_array['hale']?>) - I am quite </span><strong>hale</strong><span style="font-weight: 400;"> and hearty.</span></p>
<hr />
<p><strong>Honorary</strong><span style="font-weight: 400;"> (<?=$x_lang_array['honorary']?>) - He is the </span><strong>honorary</strong><span style="font-weight: 400;"> member of our club.</span></p>
<p><strong>Honourable</strong><span style="font-weight: 400;"> (<?=$x_lang_array['honourable']?>) - Khaled is an </span><strong>honourable</strong><span style="font-weight: 400;"> man.</span></p>
<hr />
<p><strong>Historic</strong><span style="font-weight: 400;"> (<?=$x_lang_array['historic']?>) - This is a </span><strong>historic</strong><span style="font-weight: 400;"> Place.</span></p>
<p><strong>Historical</strong><span style="font-weight: 400;"> (<?=$x_lang_array['historical']?>) - Because of </span><strong>historical</strong><span style="font-weight: 400;"> fact English is spoken all over the world.</span></p>
<p><strong>I</strong></p>
<p><strong>Industrious</strong><span style="font-weight: 400;"> (<?=$x_lang_array['industrious']?>) - </span><strong>Industrious</strong><span style="font-weight: 400;"> people never fail in life.</span></p>
<p><strong>Industrial</strong><span style="font-weight: 400;"> (<?=$x_lang_array['industrial']?>) - Tejgaon is an </span><strong>industrial</strong><span style="font-weight: 400;"> area.</span></p>
<p><strong>J</strong></p>
<p><strong>Jealous</strong><span style="font-weight: 400;"> (<?=$x_lang_array['jealous']?>) - He is </span><strong>jealous</strong><span style="font-weight: 400;"> of my success.</span></p>
<p><strong>Zealous</strong><span style="font-weight: 400;"> (<?=$x_lang_array['zealous']?>) - Munir is a </span><strong>zealous</strong><span style="font-weight: 400;"> worker.</span></p>
<p><strong>L</strong></p>
<p><strong>Later</strong><span style="font-weight: 400;"> (<?=$x_lang_array['later']?>) - He reached </span><strong>later</strong><span style="font-weight: 400;"> than all others.</span></p>
<p><strong>Latter</strong><span style="font-weight: 400;"> (<?=$x_lang_array['latter']?>) - Karim and Rahim are two brothers; The former is a doctor and </span><strong>latter</strong><span style="font-weight: 400;">is a teacher.</span></p>
<hr />
<p><strong>Last</strong><span style="font-weight: 400;"> (<?=$x_lang_array['last']?>) - Nasir is the </span><strong>last</strong><span style="font-weight: 400;"> boy in the class.</span></p>
<p><strong>Latest</strong><span style="font-weight: 400;"> (<?=$x_lang_array['latest']?>) - This is the </span><strong>latest</strong><span style="font-weight: 400;"> design of the car.</span></p>
<hr />
<p><strong>Leave</strong><span style="font-weight: 400;"> (<?=$x_lang_array['leave']?>) - Nasir is </span><strong>leaving</strong><span style="font-weight: 400;"> the hotel today.</span></p>
<p><strong>Live</strong><span style="font-weight: 400;"> (<?=$x_lang_array['live']?>) - We </span><strong>live</strong><span style="font-weight: 400;"> in the village.</span></p>
<hr />
<p><strong>Lovable</strong><span style="font-weight: 400;"> (<?=$x_lang_array['lovable']?>) - The child is very </span><strong>lovable</strong><span style="font-weight: 400;">.</span></p>
<p><strong>Lovely</strong><span style="font-weight: 400;"> (<?=$x_lang_array['lovely']?>) - Her appearance is very </span><strong>lovely</strong><span style="font-weight: 400;">.</span></p>
<hr />
<p><strong>Lose</strong><span style="font-weight: 400;"> (<?=$x_lang_array['lose']?>) - They may </span><strong>lose</strong><span style="font-weight: 400;"> the match today.</span></p>
<p><strong>Loose</strong><span style="font-weight: 400;"> (<?=$x_lang_array['loose']?>) - Oveget has put on a </span><strong>loose</strong><span style="font-weight: 400;"> shirt.</span></p>
<p><strong>M</strong></p>
<p><strong>Meat</strong><span style="font-weight: 400;"> (<?=$x_lang_array['meat']?>) - We get </span><strong>meat</strong><span style="font-weight: 400;"> from cow.</span></p>
<p><strong>Meet</strong><span style="font-weight: 400;"> (<?=$x_lang_array['meet']?>) - I intend to </span><strong>meet</strong><span style="font-weight: 400;"> him tomorrow.</span></p>
<hr/>
<p><strong>Main</strong><span style="font-weight: 400;"> (<?=$x_lang_array['main']?>) - Rice is our </span><strong>main</strong><span style="font-weight: 400;"> crops.</span></p>
<p><strong>Mane</strong><span style="font-weight: 400;"> (<?=$x_lang_array['mane']?>) - The lioness has no </span><strong>mane</strong><span style="font-weight: 400;">.</span></p>
<hr/>
<p><strong>Moral</strong><span style="font-weight: 400;"> (<?=$x_lang_array['moral']?>) - He bears a good </span><strong>moral</strong><span style="font-weight: 400;"> character.</span></p>
<p><strong>Morale</strong><span style="font-weight: 400;"> (<?=$x_lang_array['morale']?>) - They may win as their </span><strong>morale</strong><span style="font-weight: 400;"> is very high.</span></p>
<p>&nbsp;</p>
<p><strong>O</strong></p>
<p><strong>Official</strong><span style="font-weight: 400;"> (<?=$x_lang_array['official']?>) - It is an </span><strong>official</strong><span style="font-weight: 400;"> matter.</span></p>
<p><strong>Officious</strong><span style="font-weight: 400;"> (<?=$x_lang_array['officious']?>) - He is </span><strong>officious</strong><span style="font-weight: 400;"> by nature.</span></p>
<hr/>
<p><strong>Ordinance</strong><span style="font-weight: 400;"> (<?=$x_lang_array['ordinance']?>) - A new </span><strong>ordinance</strong><span style="font-weight: 400;"> has been promulgated.</span></p>
<p><strong>Ordnance</strong><span style="font-weight: 400;"> (<?=$x_lang_array['ordnance']?>) - There is an </span><strong>ordnance</strong><span style="font-weight: 400;"> factory at Gazipur.</span></p>
<p><strong>P</strong></p>
<p><strong>Pan</strong><span style="font-weight: 400;"> (<?=$x_lang_array['pan']?>) - She is making the omelet with a </span><strong>pan</strong><span style="font-weight: 400;">.</span></p>
<p><strong>Pen</strong><span style="font-weight: 400;"> (<?=$x_lang_array['pen']?>) - </span><strong>Pen</strong><span style="font-weight: 400;"> is mighter than sword.</span></p>
<hr/>
<p><strong>Pat</strong><span style="font-weight: 400;"> (<?=$x_lang_array['pat']?>) - The teacher is </span><strong>patting</strong><span style="font-weight: 400;"> the child on the shoulder.</span></p>
<p><strong>Pet</strong><span style="font-weight: 400;"> (<?=$x_lang_array['pet']?>) - The cat is a </span><strong>pet</strong><span style="font-weight: 400;"> animal.</span></p>
<hr/>
<p><strong>Peace</strong><span style="font-weight: 400;"> (<?=$x_lang_array['peace']?>) - We want </span><strong>peace</strong><span style="font-weight: 400;">.</span></p>
<p><strong>Piece</strong><span style="font-weight: 400;"> (<?=$x_lang_array['piece']?>) - I want a </span><strong>piece</strong><span style="font-weight: 400;"> of paper.</span></p>
<hr/>
<p><strong>Paper</strong><span style="font-weight: 400;"> (<?=$x_lang_array['paper']?>) - We write on </span><strong>paper</strong><span style="font-weight: 400;">.</span></p>
<p><strong>Pepper</strong><span style="font-weight: 400;"> (<?=$x_lang_array['pepper']?>) - Don't take much </span><strong>pepper</strong><span style="font-weight: 400;"> with curry.</span></p>
<hr/>
<p><strong>Person</strong><span style="font-weight: 400;"> (<?=$x_lang_array['person']?>) - Samiur Rahman is an honest </span><strong>person</strong><span style="font-weight: 400;">.</span></p>
<p><strong>Parson</strong><span style="font-weight: 400;"> (<?=$x_lang_array['parson']?>) - We went to a </span><strong>parson</strong><span style="font-weight: 400;"> to take moral ideas.</span></p>
<hr/>
<p><strong>Populous</strong><span style="font-weight: 400;"> (<?=$x_lang_array['populous']?>) - Dhaka is a </span><strong>populous</strong><span style="font-weight: 400;"> city.</span></p>
<p><strong>Popular</strong><span style="font-weight: 400;"> (<?=$x_lang_array['popular']?>) - Mawlana Abdul Hamid Khan Bhashani was a </span><strong>popular</strong><span style="font-weight: 400;"> leader.</span></p>
<hr/>
<p><strong>Pair</strong><span style="font-weight: 400;"> (<?=$x_lang_array['pair']?>) - I shall buy a </span><strong>pair</strong><span style="font-weight: 400;"> of red shoes.</span></p>
<p><strong>Pare</strong><span style="font-weight: 400;"> (<?=$x_lang_array['pare']?>) - </span><strong>Pare</strong><span style="font-weight: 400;"> the nails as they look ugly.</span></p>
<hr/>
<p><strong>Patrol</strong><span style="font-weight: 400;"> (<?=$x_lang_array['patrol']?>) - The policeman are </span><strong>patrolling</strong><span style="font-weight: 400;"> the city streets.</span></p>
<p><strong>Petrol</strong><span style="font-weight: 400;"> (<?=$x_lang_array['petrol']?>) - We use </span><strong>petrol</strong><span style="font-weight: 400;"> in the motorcars.</span></p>
<hr/>
<p><strong>Personal</strong><span style="font-weight: 400;"> (<?=$x_lang_array['personal']?>) - Don't read my </span><strong>personal</strong><span style="font-weight: 400;"> diary.</span></p>
<p><strong>Personnel</strong><span style="font-weight: 400;"> (<?=$x_lang_array['personnel']?>) - He is an army </span><strong>personnel</strong><span style="font-weight: 400;">.</span></p>
<hr/>
<p><strong>Physic</strong><span style="font-weight: 400;"> (<?=$x_lang_array['physic']?>) - Nature is a better </span><strong>physic</strong><span style="font-weight: 400;"> than any other medicine.</span></p>
<p><strong>Physique</strong><span style="font-weight: 400;"> (<?=$x_lang_array['physique']?>) - He has a good </span><strong>physique</strong><span style="font-weight: 400;">.</span></p>
<hr/>
<p><strong>Pity</strong><span style="font-weight: 400;"> (<?=$x_lang_array['pity']?>) - Have </span><strong>pity</strong><span style="font-weight: 400;"> for the poor.</span></p>
<p><strong>Piety</strong><span style="font-weight: 400;"> (<?=$x_lang_array['piety']?>) - He is respected for his </span><strong>piety</strong><span style="font-weight: 400;">.</span></p>
<hr/>
<p><strong>Practice</strong><span style="font-weight: 400;"> (<?=$x_lang_array['practice']?>) - You need constant </span><strong>practice</strong><span style="font-weight: 400;"> to write a better hand.</span></p>
<p><strong>Practise</strong><span style="font-weight: 400;"> (<?=$x_lang_array['practise']?>) - He </span><strong>practises</strong><span style="font-weight: 400;"> swimming everyday.</span></p>
<hr/>
<p><strong>Pray</strong><span style="font-weight: 400;"> (<?=$x_lang_array['pray']?>) - We should </span><strong>pray</strong><span style="font-weight: 400;"> to allah.</span></p>
<p><strong>Prey</strong><span style="font-weight: 400;"> (<?=$x_lang_array['prey']?>) - The tiger is a beast of </span><strong>prey</strong><span style="font-weight: 400;">.</span></p>
<p><strong>Q</strong></p>
<p><strong>Quiet</strong><span style="font-weight: 400;"> (<?=$x_lang_array['quiet']?>) - He is a </span><strong>quiet</strong><span style="font-weight: 400;"> boy.</span></p>
<p><strong>Quite</strong><span style="font-weight: 400;"> (<?=$x_lang_array['quite']?>) - I am </span><strong>quite</strong><span style="font-weight: 400;"> happy today.</span></p>
<p><strong>R</strong></p>
<p><strong>Refuge</strong><span style="font-weight: 400;"> (<?=$x_lang_array['refuge']?>) - Many people seek </span><strong>refuge</strong><span style="font-weight: 400;"> in highlands during flood.</span></p>
<p><strong>Refuse</strong><span style="font-weight: 400;"> (<?=$x_lang_array['refuse']?>) - He </span><strong>refused</strong><span style="font-weight: 400;"> to hear me.</span></p>
<hr/>
<p><strong>Register</strong><span style="font-weight: 400;"> (<?=$x_lang_array['register']?>) - Your name has been struck off the </span><strong>register</strong><span style="font-weight: 400;">.</span></p>
<p><strong>Registrar</strong><span style="font-weight: 400;"> (<?=$x_lang_array['registrar']?>) - Mr. Hadi was the </span><strong>registrar</strong><span style="font-weight: 400;"> of the Rajshahi University.</span></p>
<hr/>
<p><strong>Role</strong><span style="font-weight: 400;"> (<?=$x_lang_array['role']?>) - In the drama He played the </span><strong>role</strong><span style="font-weight: 400;"> of hero.</span></p>
<p><strong>Roll</strong><span style="font-weight: 400;"> (<?=$x_lang_array['roll']?>) - What is your </span><strong>roll</strong><span style="font-weight: 400;"> number?</span></p>
<p>&nbsp;</p>
<p><strong>S</strong></p>
<p><strong>Seat</strong><span style="font-weight: 400;"> (<?=$x_lang_array['seat']?>) - Please have your </span><strong>seat</strong><span style="font-weight: 400;">.</span></p>
<p><strong>Sit</strong><span style="font-weight: 400;"> (<?=$x_lang_array['sit']?>) - Please </span><strong>sit</strong><span style="font-weight: 400;"> down.</span></p>
<hr/>
<p><strong>See</strong><span style="font-weight: 400;"> (<?=$x_lang_array['see']?>) - I </span><strong>see</strong><span style="font-weight: 400;"> a bird in the nest.</span></p>
<p><strong>Sea</strong><span style="font-weight: 400;"> (<?=$x_lang_array['sea']?>) - The Bay of Bengal is a </span><strong>sea</strong><span style="font-weight: 400;">.</span></p>
<hr/>
<p><strong>Sweat</strong><span style="font-weight: 400;"> (<?=$x_lang_array['sweat']?>) - He earns by the </span><strong>sweat</strong><span style="font-weight: 400;"> of his brow.</span></p>
<p><strong>Sweet</strong><span style="font-weight: 400;"> (<?=$x_lang_array['sweet']?>) - These mangoes are very </span><strong>sweet</strong><span style="font-weight: 400;">.</span></p>
<hr/>
<p><strong>Sale</strong><span style="font-weight: 400;"> (<?=$x_lang_array['sale']?>) - I have kept my freeze for </span><strong>sale</strong><span style="font-weight: 400;">.</span></p>
<p><strong>Sell</strong><span style="font-weight: 400;"> (<?=$x_lang_array['sell']?>) - He is </span><strong>selling</strong><span style="font-weight: 400;"> his products.</span></p>
<hr/>
<p><strong>Soul</strong><span style="font-weight: 400;"> (<?=$x_lang_array['soul']?>) - The </span><strong>soul</strong><span style="font-weight: 400;"> never dies.</span></p>
<p><strong>Sole</strong><span style="font-weight: 400;"> (<?=$x_lang_array['sole']?>) - He is the </span><strong>sole</strong><span style="font-weight: 400;"> owner of this company.</span></p>
<hr/>
<p><strong>Staff</strong><span style="font-weight: 400;"> (<?=$x_lang_array['staff']?>) - All members of the office </span><strong>staff</strong><span style="font-weight: 400;"> were present in the meeting.</span></p>
<p><strong>Stuff</strong><span style="font-weight: 400;"> (<?=$x_lang_array['stuff']?>) - It is made of soft </span><strong>stuff</strong><span style="font-weight: 400;">.</span></p>
<hr/>
<p><strong>Story</strong><span style="font-weight: 400;"> (<?=$x_lang_array['story']?>) - Please tell me a very funny </span><strong>story</strong><span style="font-weight: 400;">.</span></p>
<p><strong>Storey</strong><span style="font-weight: 400;"> (<?=$x_lang_array['storey']?>) - It is a multi </span><strong>storeyied</strong><span style="font-weight: 400;"> building.</span></p>
<hr/>
<p><strong>Sometime</strong><span style="font-weight: 400;"> (<?=$x_lang_array['sometime']?>) - </span><strong>Sometime</strong><span style="font-weight: 400;">, he was a teacher of this school.</span></p>
<p><strong>Sometimes</strong><span style="font-weight: 400;"> (<?=$x_lang_array['sometimes']?>) - He </span><strong>sometimes</strong><span style="font-weight: 400;"> come here.</span></p>
<hr/>
<p><strong>Stationary</strong><span style="font-weight: 400;"> (<?=$x_lang_array['stationary']?>) - The sun is </span><strong>stationary</strong><span style="font-weight: 400;">.</span></p>
<p><strong>Stationery</strong><span style="font-weight: 400;"> (<?=$x_lang_array['stationery']?>) - I am going to a </span><strong>stationery</strong><span style="font-weight: 400;"> shop to buy a pencil.</span></p>
<hr/>
<p><strong>Ship</strong><span style="font-weight: 400;"> (<?=$x_lang_array['ship']?>) - Rana went to America by </span><strong>ship</strong><span style="font-weight: 400;">.</span></p>
<p><strong>Sheep</strong><span style="font-weight: 400;"> (<?=$x_lang_array['sheep']?>) - Many </span><strong>sheep</strong><span style="font-weight: 400;"> are grazing in the field.</span></p>
<hr/>
<p><strong>Social</strong><span style="font-weight: 400;"> (<?=$x_lang_array['social']?>) - Man is a </span><strong>social</strong><span style="font-weight: 400;"> animal.</span></p>
<p><strong>Sociable</strong><span style="font-weight: 400;"> (<?=$x_lang_array['sociable']?>) - He ia a </span><strong>sociable</strong><span style="font-weight: 400;"> man.</span></p>
<p><strong>T</strong></p>
<p><strong>Tale</strong><span style="font-weight: 400;"> (<?=$x_lang_array['tale']?>) - It was a </span><strong>tale</strong><span style="font-weight: 400;"> of adventure.</span></p>
<p><strong>Tell</strong><span style="font-weight: 400;"> (<?=$x_lang_array['tell']?>) - Please </span><strong>tell</strong><span style="font-weight: 400;"> us a story.</span></p>
<p><strong>Tail</strong><span style="font-weight: 400;"> (<?=$x_lang_array['tail']?>) - A tiger has a long </span><strong>tail</strong><span style="font-weight: 400;">.</span></p>
<hr/>
<p><strong>Test</strong><span style="font-weight: 400;"> (<?=$x_lang_array['test']?>) - He sat for the admission </span><strong>test</strong><span style="font-weight: 400;">.</span></p>
<p><strong>Taste</strong><span style="font-weight: 400;"> (<?=$x_lang_array['taste']?>) - Honey </span><strong>tastes</strong><span style="font-weight: 400;"> sweet.</span></p>
<p>&nbsp;</p>
<p><strong>U</strong></p>
<p><strong>Urban</strong><span style="font-weight: 400;"> (<?=$x_lang_array['urban']?>) - I do not prefer </span><strong>urban</strong><span style="font-weight: 400;"> life.</span></p>
<p><strong>Urbane</strong><span style="font-weight: 400;"> (<?=$x_lang_array['urbane']?>) - His </span><strong>urbane</strong><span style="font-weight: 400;"> manners pleased us.</span></p>
<p><strong>V</strong></p>
<p><strong>Vain</strong><span style="font-weight: 400;"> (<?=$x_lang_array['vain']?>) - Your all attempts will go in </span><strong>vain</strong><span style="font-weight: 400;">.</span></p>
<p><strong>Vein</strong><span style="font-weight: 400;"> (<?=$x_lang_array['vein']?>) - Blood flows through the </span><strong>vein</strong><span style="font-weight: 400;"> to the heart.</span></p>
<p><br /><br /></p>
<p><strong>W</strong></p>
<p><strong>Wander</strong><span style="font-weight: 400;"> (<?=$x_lang_array['wander']?>) - He </span><strong>wandered</strong><span style="font-weight: 400;"> here and there for the whole day.</span></p>
<p><strong>Wonder</strong><span style="font-weight: 400;"> (<?=$x_lang_array['wonder']?>) - Computer is one of the </span><strong>wonders</strong><span style="font-weight: 400;"> of modern science.</span></p>
<hr/>
<p><strong>Weak</strong><span style="font-weight: 400;"> (<?=$x_lang_array['weak']?>) - He is very </span><strong>weak</strong><span style="font-weight: 400;">.</span></p>
<p><strong>Week</strong><span style="font-weight: 400;"> (<?=$x_lang_array['week']?>) - I shall visit trade fair on next </span><strong>week</strong><span style="font-weight: 400;">.</span></p>
<p><strong>Wick</strong><span style="font-weight: 400;"> (<?=$x_lang_array['wick']?>) - The </span><strong>wick</strong><span style="font-weight: 400;"> of the candle has been completely burnt.</span></p>
<hr/>
<p><strong>Wear</strong><span style="font-weight: 400;"> (<?=$x_lang_array['wear']?>) - He always </span><strong>wear</strong><span style="font-weight: 400;"> hat.</span></p>
<p><strong>Wire</strong><span style="font-weight: 400;"> (<?=$x_lang_array['wire']?>) - This is an electric </span><strong>wire</strong><span style="font-weight: 400;">.</span></p>
							
							
                        </div>	
                    </fieldset>
                </div>

            </div>
            
            <?php include('right-content.php');?>

        </div>

<?php include('footer.php');?>