<%@ page import="java.io.*" %>
<%

            String name = request.getParameter("name2");
            String addrs = request.getParameter("address2");
			String phone = request.getParameter("phone2");
            String ii = request.getParameter("images2");
			String [] image = ii.split("#");
			String image1 = image[0];
            String image2 = image[1];
            String image3 = image[2];
			String image4 = image[3];
			String desc = request.getParameter("description2");
			
			
			
			PrintWriter writer = new PrintWriter(new BufferedWriter(new FileWriter("/var/www/htdocs/Prac3/a.temp")));
			BufferedReader br = new BufferedReader(new FileReader("/var/www/htdocs/Prac3/a.txt"));
			String[][] line = new String[3][8];
			for(int i=0;i<=2;i++){
				for(int j =0;j<=7;j++)
				{
					line[i][j]=br.readLine();
					if(i==2)
					{
						if(j==0)
						{
							line[i][j]=line[i][j].replace(line[i][j],name);
						}else if(j==1)
						{
							line[i][j]=line[i][j].replace(line[i][j],addrs);
						}else if(j==2)
						{
							line[i][j]=line[i][j].replace(line[i][j],phone);
						}else if(j==3)
						{
							line[i][j]=line[i][j].replace(line[i][j],image1);
						}else if(j==4)
						{
							line[i][j]=line[i][j].replace(line[i][j],image2);
						}else if(j==5)
						{
							line[i][j]=line[i][j].replace(line[i][j],image3);
						}else if(j==6)
						{
							line[i][j]=line[i][j].replace(line[i][j],image4);
						}else 
						{
							line[i][j]=line[i][j].replace(line[i][j],desc);
						}
					}
					writer.println(line[i][j]);
				}
			}
			writer.close();
			File realName = new File("/var/www/htdocs/Prac3/a.txt");
			realName.delete(); 
			new File("/var/www/htdocs/Prac3/a.temp").renameTo(realName); 
			response.sendRedirect("adminpage.jsp");
        %>