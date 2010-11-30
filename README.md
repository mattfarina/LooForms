# LooForms is a Lightweight Object Oriented Form Builder

LooForms is designed to make form building easy and extendable. Building a form is as simple as

    $form = new LooForm();
    $form->addElement('LooTextField')
      ->label('Blue Smurf')
      ->prefix('Watch out for Gargamel');
    ->addElement('LooSubmit')
      ->value('Yodel like a champ')
    ->render();

Sometimes you want to render a group of elements not necessarily part of a form. This is useful when you need to render just part of a form for AJAX. For example

    $group = new LooGroup();
    $group->addElement('LooTextField')
      ->label('Blue Smurf')
      ->prefix('Watch out for Gargamel');
    ->addElement('LooSubmit')
      ->value('Yodel like a champ')
    ->render();

More details coming soon. This project is under heavy development.

On an unrelated note, did you know that a Loo is another name for a toilet?