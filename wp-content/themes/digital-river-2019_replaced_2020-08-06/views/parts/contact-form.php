<?php $form_id = get_field("marketo_form_id", 'option'); ?>

<button type="button" class="btn btn-primary contact-form-button" data-toggle="modal" data-target="#contact-form">
    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="34" height="37"
         viewBox="0 0 34 37">
        <image id="Vector_Smart_Object" data-name="Vector Smart Object" width="34" height="37"
               xlink:href="data:img/png;base64,iVBORw0KGgoAAAANSUhEUgAAACIAAAAlCAYAAAAnQjt6AAADAElEQVRYhc2YzUsVYRTGf97MDEvTFqWUBUUURUpFYBjV0pSg6GPRF62SFv4DrRK0oF20aBcugswiMkkqKcmgLkWLgiACQTBsYeYHlkT6xAtnYhzG61zv3G4HXmbm/XjO8573nDNnJk8SaUghcAQ4BOwG1gEJWz4DDABvgE7gHjAVGdoRidAc4fOShjRbJiUNWpsMjLm5jZISUXREIVEiqdunoEfSKUkVIXPLbazHN/+JpLJMiTgSSQPsl3QgogWxuf229oOk0oUSyfNZIhllVyGtzLeRp6mOKRVIowF8nm8387RSw3DSlC6RZZKGJc1IqsmAhNdqDOubpOJ0iFywHbTHQMJr7amsMteiPltUGyORWsN8HTYeltCKgDFgBFhtiSoOcYnvK7ASWAFM+DETIQq2AYuAZIwkMKyk6awKDoYRqbTrQIwkPPEwK4MDYUSK7DqcBSIeZkEUIrkRn+fWSXosacz3nnCx3xxDxDQblifjlmnrg+F7KaB81CY76Y2BSK9hTRj2tE9fi0ek3jp+SDonaYktXp8FItX27HSc9W22wXU+t4czgcXZJOK1E54O56x7gEngVg6ctAP4DtQkLJRcWE3ngIhLcuOOw38Tvh6RxTnkkOcRGQTKgbU5IFEBrHEcHJG7xupGWOrNojhd180YHflAK3AUOAi8B+5YCVCWBQ4ngf1WBhwHttiJXPbieaOkd75s55fuGPJI9xzYb033rMLImcix3el7A7vB+2apTGQ7cBhoAHYBN4E2oO9vzRNjKRildZkl9kYpFbMlBVYqlpj/jfn1/MuE5gKiFHgRJOEkP0PwauCYz6d+AS+Bh+ZfnqwCrtr9tVCkDM77dKCu8Mtt37ytkj7aWNdceAv1kaXAkJ33FeCT9S8HLpoFWoBN9j/FfRW8AurCjiUTi1TZDp+FjDUFrPNTUqukwlSYC/WREbtutvfUkD07vH12/8iydKfVHCklk/B9YL+wfgNfrM9FRbER3QCMRkbLwFndV32bpKnAUbhv2x1pYUn8ARtLl/f1l1qyAAAAAElFTkSuQmCC"/>
    </svg>
</button>

<div class="modal fade" id="contact-form" tabindex="-1" role="dialog" aria-labelledby="contact-form-label"
     aria-hidden="true" data-id="<?= $form_id ?>">
    <div class="modal-dialog" role="document">
        <div class="modal-content dr_step active" data-step="1">
            <?php
                switch ( get_current_blog_id() ) {
                    case '12': // German
                        View::make("parts/contact-us-step-1-de");
                        break;

                    case '14': // China
                        View::make("parts/contact-us-step-1-cn");
                        break;

                    case '16': // Japan
                        View::make("parts/contact-us-step-1-jp");
                        break;

                    default:
                        View::make("parts/contact-us-step-1");
                        break;
                }
            ?>
        </div>

        <div class="modal-content dr_step" data-step="2">
            <?php
                switch ( get_current_blog_id() ) {
                    case '12': // German
                        View::make("parts/contact-us-step-2-de", ["form_id" => $form_id]);
                        break;

                    case '14': // China
                        View::make("parts/contact-us-step-2-cn", ["form_id" => $form_id]);
                        break;

                    case '16': // Japan
                        View::make("parts/contact-us-step-2-jp", ["form_id" => $form_id]);
                        break;

                    default:
                        View::make("parts/contact-us-step-2", ["form_id" => $form_id]);
                        break;
                }
            ?>
        </div>
    </div>
</div>
