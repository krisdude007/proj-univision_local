<div class="fabmob_content-container">
    <ul id="fabmob_topics">
        <li>
            <?php $i = 1; ?>
            <?php foreach ($questions as $question): ?>
                <div class="fabmob_topic-content">
                    <a href="/videoupload/<?php echo($question->id); ?>">
                        <h4 class="fabmob_topic-header"><?php echo $i; ?> Tema</h4>
                        <p> <?php echo $question->question; ?></p>
                        <span class="fabmob_topic-arrow-btn"></span>
                    </a>
                    <?php ++$i; ?>
                </div>
            <?php endforeach; ?>
        </li>
    </ul>
</div>

