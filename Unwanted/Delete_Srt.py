from os import path, listdir, mkdir, remove, rmdir

files_extension_to_move = ["srt", "vtt"]
NEW_DIR_NAME = "SRT and VTT files"
CUR_DIR = path.dirname( __file__ )

def move_srt_and_vtt_files( dir_name = CUR_DIR ):

    files_to_be_moved = []
    print("\n")

    for i in listdir( dir_name ):

        joined_path = path.join( dir_name, i)

        if path.isdir( joined_path ):

            for j in move_srt_and_vtt_files( joined_path ):
                files_to_be_moved.append( j )

        else:

            if i.split(".")[-1] in files_extension_to_move:

                print( joined_path )
                files_to_be_moved.append( joined_path )

    return files_to_be_moved


def delete_srt():

    files_to_be_moved = move_srt_and_vtt_files()

    ans = input(f"\n\nAre you sure you want to delete the {NEW_DIR_NAME}? [ y or n ] : ").lower()
    if ans in ["yes","y","1"]:
        
        for file in files_to_be_moved:

            folder_name = path.dirname( file )
            moved_files_dir_name = NEW_DIR_NAME
            moved_files_dir = path.join( folder_name, moved_files_dir_name )

            if not path.isdir( moved_files_dir ):
                mkdir( moved_files_dir )

            with open( file, "r" ) as source_file:
                with open( path.join( moved_files_dir, file.split("\\")[-1] ), "w" ) as destination_file:
                    data = source_file.readlines()
                    destination_file.writelines( data )

            remove( file )

        input("\nProcess completed successfully!\nPress Enter to exit.")
    else:
        input("\nFile Deletion has been canceled!\nPress Enter to exit.")


def undo_move_srt_and_vtt_files( dir_name = CUR_DIR ):
    
    print("\n")

    file_move_from_loc = []

    for i in listdir( dir_name ):

        joined_path = path.join( dir_name, i )

        if( path.isdir( joined_path ) ):

            for j in undo_move_srt_and_vtt_files( joined_path ):
                file_move_from_loc.append( j )

        else:
            oneUpDir = dir_name.split("\\")[-1]

            if( oneUpDir == NEW_DIR_NAME ):

                if i.split(".")[-1] in files_extension_to_move:
                    print( joined_path )
                    file_move_from_loc.append( joined_path )

        
    return file_move_from_loc
                



def undo_delete_srt():

    delete_folders = []

    undo_files = undo_move_srt_and_vtt_files()
    
    ans = input(f"\n\nAre you sure you want to undo the Move of {NEW_DIR_NAME}? [ y or n ] : ").lower()

    if ans in ["yes","y","1"]:

        for file in undo_files:
            
            move_files_dir = file.split("\\")

            delete_folder_location = "\\".join( move_files_dir[ : -1 ] )
            if( delete_folder_location not in delete_folders ): 
                delete_folders.append( delete_folder_location )

            move_files_dir = "\\".join( move_files_dir[ : -2 ] + [ move_files_dir[ len( move_files_dir ) - 1 ] ] )
            
            with open( file, "r" ) as source_file:
                with open( move_files_dir, "w" ) as destination_file:
                    data = source_file.readlines()
                    destination_file.writelines( data )
        
            remove( file )

        for i in delete_folders:
            rmdir( i )

        input("\nProcess completed successfully!\nPress Enter to exit.")

    else:

        input("\nUndo process has been canceled!\nPress Enter to exit.")

    


if __name__ == "__main__":

    print(f"""
    1. To Delete / Move the {NEW_DIR_NAME}.
    2. Undo the Move of {NEW_DIR_NAME}.
    """)

    option = input("\n\t Enter you're option : ")

    if( option in ["1", "2"] ):

        if( option == "1" ):
            delete_srt()
        else:
            undo_delete_srt()
            
    else :

        input("\nUnknown option selected.\nPress ' Enter / Return ' to exit")


                    
            