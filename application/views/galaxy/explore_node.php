                            <?php
                                function print_node($node){
                                    $linktext = ($node->link === null || strlen($node->link)<=5)? '' : '@';
                                    $idparent = ($node->id_parent <= 0)? $node->id:$node->id_parent;
                                    echo('<div class ="node" id = "'.$node->id.'">');
                                        echo('<h3>
                                            <a href = "'. $node->link .'">'. $linktext .'</a>
                                            <a href="'.h(site_url('galaxy/explore/'.$node->id)).'">'.h($node->title).'</a>'
                                            .' <a href="'.h(site_url('galaxy/explore/'.$idparent)).'">'.'&#x21b0'.'</a></h3>');
                                        echo('<p>'.h($node->text).'</p>');
                                        echo('<p class = "date"><i>'.h($node->date).'</i></p>');
                                        foreach ($node->children as $child)
                                            
                                            print_node($child);
                                    echo('</div>');
                                }
                                print_node($node);
                            ?>