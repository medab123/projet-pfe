from bs4 import BeautifulSoup

# Color codes for console output
class Colors:
    INFO = '\033[94m'
    WARNING = '\033[93m'
    END = '\033[0m'

linkfile = 'index-4.html'
assetsLink = "homeTheme/"
header_file_path = 'test/header.blade.php'
footer_file_path = 'test/footer.blade.php'
index_file_path = 'test/index.blade.php'

with open(linkfile, 'r', encoding='utf-8') as file:
    html_doc = file.read()

soup = BeautifulSoup(html_doc, 'html.parser')
images = soup.find_all('img')
scripts = soup.find_all('script')
links = soup.find_all('link')

for img in images + scripts:
    if 'src' in img.attrs:
        src = img['src']
        if not src.startswith(('http://', 'https://')):
            new_src = "{{ asset('"+assetsLink + src + "') }}"
            img['src'] = new_src

for link in links:
    if 'href' in link.attrs:
        href = link['href']
        if not href.startswith(('http://', 'https://')):
            new_href = "{{ asset('"+assetsLink + href + "') }}"
            link['href'] = new_href

modified_html = soup.prettify()

with open('welcome.blade.php', 'w', encoding='utf-8') as file:
    file.write(modified_html)

print(Colors.INFO + "[info] Modified HTML has been written to welcome.blade.php." + Colors.END)

def extract_header_footer(html_content):
    print(Colors.INFO + "[info] Separating files started..." + Colors.END)
    header_content = ''
    footer_content = ''
    index_content = ''

    header_end_index = html_content.find('</header>')
    if header_end_index != -1:
        header_content = html_content[:header_end_index + len('</header>')]
    else:
        print(Colors.WARNING + "[warning] Header not found!" + Colors.END)

    footer_start_index = html_content.find('<footer ')
    if footer_start_index != -1:
        footer_content = html_content[footer_start_index:]
    else:
        print(Colors.WARNING + "[warning] Footer not found!" + Colors.END)

    if header_end_index != -1 and footer_start_index != -1:
        index_content = html_content[header_end_index + len('</header>'):footer_start_index]
    else:
        print(Colors.WARNING + "[warning] Content not found!" + Colors.END)

    print(Colors.INFO + "[info] Separation finished" + Colors.END)

    return header_content, footer_content, index_content

def write_to_file(file_path, content):
    with open(file_path, 'w') as file:
        file.write(content)

header_content, footer_content, index_content = extract_header_footer(modified_html)

print(Colors.INFO + "[info] Writing files..." + Colors.END, end=" ")
write_to_file(header_file_path, header_content)
write_to_file(footer_file_path, footer_content)
write_to_file(index_file_path, index_content)
print(Colors.INFO + "Done." + Colors.END)
