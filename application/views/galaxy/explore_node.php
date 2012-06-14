                            <?php
                                function print_node($node){
                                    $linktext = ($node->link === null || strlen($node->link)<=5)? '' : '@';
                                    echo('<div class ="node">');
                                        echo('<h3>
                                            <a href = "'. $node->link .'">'. $linktext .'</a>
                                            <a href="'.h(site_url('galaxy/explore/'.$node->id))
                                            .'">'.h($node->title).'</a></h3>');
                                        echo('<p>'.h($node->text).'</p>');
                                        echo('<p class = "date"><i>'.h($node->date).'</i></p>');
                                        foreach ($node->children as $child)
                                            
                                            print_node($child);
                                    echo('</div>');
                                }
                                print_node($node);
                            ?>