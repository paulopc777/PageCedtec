<?php

$categoria = ['Tecnologia', 'Finanças', 'Soft Skill', 'marketing'];

for ($i = 0; $i < count($categoria); $i++) {
    echo "
        <div class='btn-category'>
            <a href='#'>$categoria[$i]</a>
        </div>
        ";
};
