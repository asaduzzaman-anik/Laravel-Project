 @props(['status' => 'pending'])
 @php
     $classes = 'inline-block rounded-full border px-2 py-1 text-xs font-medium';

     if ($status === 'pending') {
         $classes .= ' bg-yellow-500/10 border-yellow-500/20 text-yellow-500';
     }
     if ($status === 'in_progress') {
         $classes .= ' bg-blue-500/10 border-blue-500/20 text-blue-500';
     }
     if ($status === 'completed') {
         $classes .= ' bg-primary/10 border-primary/20 text-primary';
     }
 @endphp
 <span {{ $attributes(['class' => $classes]) }}>
     {{ $slot }}
 </span>
