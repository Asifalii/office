<?php include('header.php'); ?>
<?php

echo $alladcodes['300'];

?>
    <!--Specific Page Content-->
    <div class="box_wrapper">
        <fieldset>
		<legend><span class="custom_font2"><h1>Learn 300+ TOEFL Words</h1></span></legend>
		<div class="fieldset_body inner_details">
           
            <?php
			mysqli_set_charset($conn, "utf8");

            $words = ['abundant', 'accumulate', 'accurate', 'accustomed', 'acquire', 'adamant', 'adequate', 'adjacent', 'adjust', 'advantage', 'advocate', 'adverse', 'aggregate', 'aggressive', 'allocate', 'alternative', 'amateur', 'ambiguous', 'ambitious', 'amend', 'ample', 'anomaly', 'annual', 'antagonize', 'attitude', 'attribute', 'arbitrary', 'arduous', 'assuage', 'assume', 'augment', 'benefit', 'berate', 'bestow', 'boast', 'boost', 'brash', 'brief', 'brusque', 'cacophony', 'cease', 'censure', 'chronological', 'clarify', 'coalesce', 'coerce', 'cognizant', 'cohesion', 'coincide', 'collapse', 'collide', 'commitment', 'community', 'conceal', 'concur', 'conflict', 'constrain', 'contemplate', 'continuously', 'contradict', 'contribute', 'convey', 'copious', 'core', 'corrode', 'cumbersome', 'curriculum', 'data', 'decay', 'deceive', 'decipher', 'declaration', 'decline', 'degrade', 'demonstrate', 'deny', 'deplete', 'deposit', 'desirable', 'despise', 'detect', 'deter', 'deviate', 'devise', 'diatribe', 'digress', 'dilemma', 'diminish', 'dispose', 'disproportionate', 'disrupt', 'distort', 'distribute', 'diverse', 'divert', 'dynamic', 'ease', 'efficient', 'eliminate', 'elite', 'eloquent', 'emphasize', 'endure', 'enhance', 'epitome', 'equivalent', 'erroneous', 'estimate', 'evade', 'evaluate', 'evidence', 'evolve', 'exemplary', 'exclude', 'exclusive', 'expand', 'expertise', 'exploit', 'expose', 'extension', 'extract', 'famine', 'feasible', 'finite', 'flaw', 'fluctuate', 'focus', 'fortify', 'framework', 'frivolous', 'function', 'fundamental', 'gap', 'garbled', 'generate', 'grandiose', 'hackneyed', 'haphazard', 'harsh', 'hasty', 'hazardous', 'hesitate', 'hierarchy', 'hindrance', 'hollow', 'horror', 'hostile', 'hypothesis', 'identical', 'illiterate', 'illustrate', 'impact', 'impair', 'implement', 'imply', 'impose', 'impoverish', 'incentive', 'incessant', 'incidental', 'incite', 'inclination', 'incompetent', 'inconsistent', 'indefatigable', 'indisputable', 'ineffective', 'inevitable', 'infer', 'inflate', 'influence', 'inhibit', 'initial', 'inquiry', 'integral', 'integrate', 'interpret', 'intervene', 'intrepid', 'intricate', 'invasive', 'investigate', 'irascible', 'irony', 'irresolute', 'jargon', 'jointly', 'knack', 'labor', 'lag', 'lampoon', 'languish', 'lecture', 'leery', 'legitimate', 'lenient', 'likely', 'ludicrous', 'maintain', 'major', 'manipulate', 'maximize', 'measure', 'mediocre', 'mend', 'method', 'migrate', 'minimum', 'misleading', 'modify', 'morose', 'negligent', 'nonchalant', 'obey', 'obtain', 'obvious', 'opponent', 'oppress', 'origin', 'paradigm', 'parsimonious', 'partake', 'partial', 'paucity', 'peak', 'peripheral', 'permeate', 'persist', 'pertain', 'phase', 'poll', 'potent', 'pragmatic', 'praise', 'precede', 'precise', 'prestigious', 'prevalent', 'primary', 'prior', 'proceed', 'progeny', 'promote', 'prosper', 'proximity', 'quarrel', 'range', 'rank', 'rebuke', 'recapitulate', 'recede', 'recommend', 'reform', 'regulate', 'reinforce', 'reject', 'release', 'rely', 'reproach', 'require', 'resent', 'resign', 'resist', 'resolve', 'restrict', 'retain', 'retract', 'retrieve', 'rhetorical', 'rigid', 'rotate', 'safeguard', 'scrutinize', 'section', 'select', 'sequence', 'severe', 'shallow', 'shelter', 'shrink', 'significant', 'source', 'sparse', 'specify', 'speculate', 'solitary', 'somber', 'soothe', 'squalid', 'stable', 'stagnant', 'strategy', 'subsequent', 'substitute', 'subtle', 'sufficient', 'summarize', 'supervise', 'supplant', 'suspend', 'suspicious', 'sustain', 'symbolic', 'technical', 'terminal', 'tolerate', 'transfer', 'transition', 'transparent', 'tuition', 'unobtrusive', 'unscathed', 'upbeat', 'unjust', 'vacillate', 'valid', 'vanish', 'vary', 'verdict', 'vestige', 'vial', 'vilify', 'voluminous', 'whereas', 'wholly', 'widespread', 'wilt'];

            $mean = array();
            $query = mysqli_query($conn, "select `" . $lang . "` as mean, word from v3_word_mean where word in ('" . implode("','", $words) . "')");
            while ($row = mysqli_fetch_assoc($query)) {

                $mean[$row['word']] = $row['mean'];
            }
		
			$i = '';
			$pageContent = '';
			$links = '';
            foreach ($words as $w) {
                $w_l = strtolower($w);
                $i++;
				
                if (array_key_exists($w_l,$mean) && $mean[$w_l] != $w_l && $mean[$w_l]) {
                    $pageContent .= '<span><a title="English to ' . $ulang . ' Meaning of ' . $w . '" href="' . $base_url . 'english-to-' . $lang . '-meaning-' . urlencode($w) . '"><label class="cursor_link">' . $i . '. ' . $w . ' (' . $mean[$w_l] . ') <label></span></a>';

                }
            }

            $pageContent .= '</div>';

            $pageContent .= $links;

            echo $pageContent;


            ?>
			
			</div>

        </fieldset>

        <!--<div class="pagination">
          <a href="#">&laquo;</a>
          <a href="#" class="active">1</a>
          <a href="#">2</a>
          <a href="#">3</a>
          <a href="#">4</a>
          <a href="#">5</a>
          <a href="#">&raquo;</a>
        </div>-->
    </div>

<?php include('right-content.php'); ?>

    </div>

<?php include('footer.php'); ?>