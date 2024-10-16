@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'border-gray-600 focus:border-indigo-100 bg-primary text-white focus:ring-indigo-500 rounded-md shadow-sm']) }}>
