                            <?php
                                function print_node($node){
                                    $linktext = ($node->link === null || strlen($node->link)<=5)? '' : '@';
                                    $idparent = ($node->id_parent <= 0)? $node->id:$node->id_parent;
                                    $subnodes = $node->weight - 1;
                                    echo('<div class ="node" id = "n'.$node->id.'">');
                                        echo('<div class = "node_title">
                                            <a title="Parent node" href="'.h(site_url('galaxy/node/'.$idparent)).'">'.'&not;'.'</a> '.
                                            '<a title = "Reply to this node"'.$node->id.'" onclick = "show_reply('.$node->id.')">+</a> '.
                                            '<a title = "Attached link" href = "'. $node->link .'">'. $linktext .'</a>
                                            <a title="This node (#'.$node->id.')" href="'.h(site_url('galaxy/node/'.$node->id)).'">'.h($node->title).'</a>
                                            ('.$subnodes.')</div>');
                                        echo('<div class = "node_text">'.h($node->text).'</div>');
                                        echo('<div class = "node_footer"><i>'.h($node->date).'</i></div>');
                                        echo('<div class= "reply"> </div>');
                                        foreach ($node->children as $child)
                                            print_node($child);
                                    echo('</div>');
                                }
                                print_node($node);
                            ?>

                            <script language="Javascript">
                                function show_reply(id_node) {
                                    $('#n'+id_node+' div.reply:first').html(reply_form(id_node));
                                    $('#n'+id_node+' div.reply:first input.title-input').watermark('Title (32)');
                                    $('#n'+id_node+' div.reply:first textarea.text-input').watermark('Content (256)');
                                    $('#n'+id_node+' div.reply:first input.link-input').watermark('Link (128)');
                                }
                                function reply_form(id_node) {
                                    var str = ' ';
                                    str += '<p><form method="post" action = "<?php echo(site_url('galaxy/create')); ?>">';
                                    str += '<input class = "title-input" type="text" name="title"/><br/>';
                                    str += '<textarea class = "text-input" name = "text"></textarea> <br/>';
                                    str += '<input class = "link-input" type="text" name="link"><br/>';
                                    str += '<input class = "btn btn" type="submit" value="Submit" />';
                                    str += '';
                                    str += '';
                                    str += '';
                                    str += '';
                                    str += '</form></p>';
                                    return str;
                                }
                            </script>