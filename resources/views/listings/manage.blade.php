@extends('layout')    

@section('content')
   {{-- <h1>Welcome to manage Gigs page</h1> --}}
   <section class="manage-gig-section">
        <div>
            <h2>Manage your Gigs</h2>
        </div>

        @if (count($listings) > 0)
        <table class="gig-table">
            <tr>
                <th>Gig Title</th>
                <th>Actions</th>
            </tr>


            {{-- <tr>
                <td class="gig-title">Laravel job</td>
                <td class="action-tdata">
                   
                    <i class="fa fa-trash" aria-hidden="true"></i>
                </td>
            </tr> --}}

            {{-- <tr>
                <td class="gig-title">NodeJs job</td>
                <td class="action-tdata">
                    <i class="far fa-edit"></i>
                    <i class="fa fa-trash" aria-hidden="true"></i>
                </td>
            </tr> --}}
         
            @foreach($listings as $listing)

                <tr>
                    <td class="gig-title">{{$listing->title}}</td>
                    <td class="action-tdata">
                        <a href="/listings/{{$listing->id}}/edit" class="edit-link">
                            <i class="far fa-edit gig-edit"></i>
                        </a>
                        <form action="/listings/{{$listing->id}}" method="POST" class="gig-form">
                            @csrf
                            @method('DELETE')
                            {{-- <button>Delete</button> --}}
                            <button>
                                <i class="fa fa-trash" aria-hidden="true"></i>
                            </button>
                        </form>
                        {{-- <i class="fa fa-trash" aria-hidden="true"></i> --}}
                    </td>
                </tr>
                
            @endforeach  
        </table>
        @else
            <div class="no-gigs-container">
                <p>No Gigs!!!!!!!!</p>
                <a href="/listing/create">Add Gig</a>
            </div>
        @endif

        {{-- <table class="gig-table">
            <tr>
                <th>Gig Title</th>
                <th>Actions</th>
            </tr>


            <tr>
                <td class="gig-title">Laravel job</td>
                <td class="action-tdata">
                   
                    <i class="fa fa-trash" aria-hidden="true"></i>
                </td>
            </tr>

            <tr>
                <td class="gig-title">NodeJs job</td>
                <td class="action-tdata">
                    <i class="far fa-edit"></i>
                    <i class="fa fa-trash" aria-hidden="true"></i>
                </td>
            </tr>
         
            @foreach($listings as $listing)

                <tr>
                    <td class="gig-title">{{$listing->title}}</td>
                    <td class="action-tdata">
                        <a href="/listings/{{$listing->id}}/edit">
                            <i class="far fa-edit"></i>
                        </a>
                        <i class="fa fa-trash" aria-hidden="true"></i>
                    </td>
                </tr>
                
            @endforeach  
        </table> --}}
   </section>

@endsection