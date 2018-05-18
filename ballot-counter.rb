require "pp"

def findWinner(votes)

	candidates = votes.uniq
	tally = {}

	candidates.each do |candidate|
		tally[candidate] = 0
	end
	
	votes.each do |vote|
		tally[vote] += 1
	end
	
	tallies = []
	tally.each do |k,v|
		tallies << v
	end

	tallies = tallies.sort
	highest = tallies.last
	selectWinners = tally.select { |k,v| v==highest }
	selectWinners = selectWinners.sort_by{|k,v| k}
	winner=selectWinners.last[0]
	
	return winner


end


votes = ["Will","John","Timothy","Will","Timothy","Steve","Will","Timothy","John"]
puts findWinner votes


