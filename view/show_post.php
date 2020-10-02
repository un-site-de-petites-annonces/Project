
<div class="news">
            <h3>
                <?= htmlspecialchars($showPost['title']) ?>
                <em>Par <?= htmlspecialchars($showPost['author']) ?></em>
            </h3>
            
            <p>
                <?= nl2br(htmlspecialchars($showPost['content'])) ?>
            </p>
            <img src="<?php echo htmlspecialchars($showPost['imagePath']) ?>" alt="test image">
        </div>

        