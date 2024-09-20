<div>
    <!-- Center the table container -->
    <div class="relative overflow-x-auto shadow-md rounded-lg mx-auto">
        <table class="w-full text-md text-left text-gray-500 ">
            <thead class="text-sm text-gray-700 uppercase bg-gray-50">
                <tr>
                    @foreach($this->columns() as $column)
                        @php
                            // Adjust width classes based on the column
                            switch ($column->key) {
                                case 'title':
                                    $widthClass = 'w-2/12';
                                    break;
                                case 'description':
                                    $widthClass = 'w-3/12';
                                    break;
                                default:
                                    $widthClass = 'w-1/12';
                            }
                        @endphp
                        <th class="py-3 px-6 text-md whitespace-nowrap {{ $widthClass }}">
                            <!-- Display the column label -->
                            {{ $column->label }}
                        </th>
                    @endforeach
                    <th class="py-3 px-6 text-md whitespace-nowrap w-1/12">
                        Show
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($this->data() as $row)
                    <tr class="bg-white border-b hover:bg-gray-50">
                        @foreach($this->columns() as $column)
                            <td class="py-3 px-6 text-mdwhitespace-nowrap overflow-hidden text-ellipsis">
                                <div class="flex items-center cursor-pointer">
                                    <x-dynamic-component
                                        :component="$column->component"
                                        :value="$column->getValue($row)"

                                    />

                                </div>
                            </td>
                        @endforeach
                        <td class="py-3 px-6 text-mdwhitespace-nowrap overflow-hidden text-ellipsis">
                            <div class="flex items center">
                                <a href="{{ route('tickets.show', $row->id) }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">
                                Show
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{ $this->data()->links() }}
</div>
