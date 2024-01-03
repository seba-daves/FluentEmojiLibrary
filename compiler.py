import os
import pathlib
import json
def main():
    print("____-------Fluent Emoji Library CSV Creator-------____\n\n\n")
    csv=""
    folders=os.listdir(".")
    for folder in folders:
        if not (os.path.isfile(folder)):
            metadata = str(pathlib.Path(folder).parent.resolve())+"//"+folder+"//metadata.json"
            file=open(metadata,'r',encoding='utf-8')
            raw=file.read()
            JSON=json.loads(raw)
            if csv=="":
                csv+=(JSON['glyph']).strip() + ";" +folder
            else:
                csv+="\n"+(JSON['glyph']).strip() + ";" +folder
            print(csv)
            file.close()
    output=open("emojis.csv","w",-1,'utf-8')
    output.write(csv)
    output.close()
    print("\n\n-------Creation Done, Remember to move the 'emoji.csv' file to the parent folder!-------\n\n")


main()